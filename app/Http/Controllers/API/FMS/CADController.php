<?php

namespace App\Http\Controllers\API\FMS;

use App\Models\FMS\CAD;
use App\Models\FMS\Unit;
use Illuminate\Http\Request;
use App\Models\FMS\CADRemark;
use Illuminate\Validation\Rule;
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

    /**
     * Handle a state change
     * 
     * @param Request $request
     */
    public function state(Request $request)
    {
      $unit = Unit::find($request->unit['id']);
      $unit->state = $request->unit['state'];
      $unit->assigned_cad = $request->unit['assigned_cad'];
      $unit->save();
    }

    /**
     * Create a CAD
     * 
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $request->validate([
        'cad_number' => 'required|integer',
        'caller_name' => 'required|regex:/^[a-zA-Z\s]*$/',
        'description' => 'required|regex:/^[a-zA-Z\s]*$/',
        'display_name' => 'required|regex:/([0-9]{5})(\/)([0-3][1-9])([A-Z]{3})([0-9]{2})/',
        'location' => 'required|regex:/^[a-zA-Z\s]*$/',
        'response_level' => [
          'required',
          Rule::in(['Immediate', 'Standard'])
        ],
        'vrm' => 'required|regex:/[a-zA-Z0-9\s]+/',
      ]);
      
      $cad = new CAD();
      $cad->cad_number = $request->cad_number;
      $cad->caller_name = $request->caller_name;
      $cad->description = $request->description;
      $cad->display_name = $request->display_name;
      $cad->location = $request->location;
      $cad->response_level = $request->response_level;
      $cad->vrm = $request->vrm;
      $cad->save();
      return $cad;
    }

    /**
     * Update a CAD
     * 
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $request->validate([
        'id' => 'required|numeric',
        'caller_name' => 'required|regex:/^[a-zA-Z\s]*$/',
        'description' => 'required|regex:/^[a-zA-Z\s]*$/',
        'location' => 'required|regex:/^[a-zA-Z\s]*$/',
        'response_level' => [
          'required',
          Rule::in(['Immediate', 'Standard'])
        ],
        'vrm' => 'required|regex:/[a-zA-Z0-9\s]+/',
      ]);

      $cad = CAD::find($request->id);
      $cad->caller_name = $request->caller_name;
      $cad->description = $request->description;
      $cad->location = $request->location;
      $cad->response_level = $request->response_level;
      $cad->vrm = $request->vrm;
      $cad->save();
      return $cad;
    }
}
