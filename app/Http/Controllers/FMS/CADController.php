<?php

namespace App\Http\Controllers\FMS;

use Carbon\Carbon;
use App\Models\FMS\CAD;
use App\Models\FMS\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CADController extends Controller
{
    /**
     * Return CAD landing page
     */
    public function index()
    {
        return view('fms.app');
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

    }

    /**
     * Return all the information for the CAD display
     */
    public function show()
    {
        $cads = CAD::whereDate('created_at', Carbon::today())->get();
        $units = Unit::all()->load('users.user.qualifications', 'vehicle');

        return [
            'cads' => $cads,
            'units' => $units
        ];
    }

    /**
     * Return a cad
     */
    public function getCad($id=null)
    {
        if($id)
        {
            $cad = CAD::with('units')->find($id);
        }
        else
        {
            $cad = CAD::whereDate('created_at', Carbon::today())->firstOrFail()->load('units');
        }

        return $cad;

    }
}
