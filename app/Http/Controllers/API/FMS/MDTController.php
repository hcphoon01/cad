<?php

namespace App\Http\Controllers\API\FMS;

use App\Models\FMS\CAD;
use App\Models\FMS\Unit;
use App\Events\RemarkAdded;
use App\Events\UnitDetached;
use Illuminate\Http\Request;
use App\Models\FMS\CADRemark;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MDTController extends Controller
{
    /**
     * Return all the information for the MDT display
     */
    public function show()
    {
      $unit = Unit::whereHas('users', function($q) {
        $q->where('user_id', Auth::id());
      })->with('users.user', 'vehicle', 'callsign')->first();

      $cad = CAD::whereHas('units', function($q) use ($unit) {
        $q->where('id', $unit->id);
      })->with('remarks.unit.callsign', 'remarks.controller.callsign', 'units.callsign')->first();

      return [
          'unit' => $unit,
          'cad' => $cad
      ];
    }

    /**
     * Handle adding a remark
     * 
     * @param Request $request
     */
    public function remark(Request $request)
    {
      $request->validate([
          'id' => 'required|numeric|exists:cads,id',
          'unit' => 'required|numeric|exists:units,id',
          'remark' => 'required'
      ]);

      $remark = new CADRemark();
      $remark->cad_id = $request->id;
      $remark->unit_id = $request->unit;
      $remark->remark = $request->remark;
      $remark->save();

      $remark->load('unit.callsign');

      event(new RemarkAdded($remark));
    }

    /**
     * Dissociate unit
     * 
     * @param Request $request
     */
    public function dissociate(Request $request)
    {
      $request->validate([
        'id' => 'required|numeric|exists:units,id',
        'state' => 'required|numeric'
      ]);

      $unit = Unit::find($request->id);
      $unit->state = $request->state;
      $unit->assigned_cad = $request->assigned_cad;
      if ($request->assigned_cad == null) {
        event(new UnitDetached($unit));
      }
      $unit->save();

    }
}
