<?php

namespace App\Http\Controllers\API\FMS;

use App\Models\FMS\Unit;
use Illuminate\Http\Request;
use App\Models\FMS\CADRemark;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CADController extends Controller
{
    /**
     * Handle adding a remark
     * 
     * @param Request $request
     */
    public function remark(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric|exists:cads,id',
            'unit' => 'required|numeric|exists:controllers,id',
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

    /** Handle assign a unit
     * 
     * @param Request $request
     */
    public function assign(Request $request)
    {
      $unit = Unit::find($request->unit['id']);
      $unit->cad()->dissociate();
      $unit->state = $request->unit['state'];
      $unit->assigned_cad = $request->cad['id'];
      $unit->save();
    }
}
