<?php

namespace App\Http\Controllers\API\FMS;

use App\Models\FMS\Unit;
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
      })->with('cad.remarks.unit.callsign', 'users.user', 'vehicle', 'callsign')->get();

      return [
          'unit' => $unit
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
          'type' => 'required|alpha',
          'remark' => 'required|alpha_dash'
      ]);

      $remark = new CADRemark();
      $remark->cad_id = $request->id;
      $remark->unit_id = $request->unit;
      $remark->type = $request->type;
      $remark->remark = $request->remark;
      $remark->save();
    }
}
