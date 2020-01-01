<?php

namespace App\Http\Controllers\HR;

use Illuminate\Http\Request;
use App\Models\User\Applicant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Return the application status page
     */
    public function status()
    {
        $applicant = Applicant::where('id', Auth::user()->id)->first();

        return view('application.status', [
            'applicant' => $applicant
        ]);
    }
}
