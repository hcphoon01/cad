<?php

namespace App\Http\Controllers\FMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
