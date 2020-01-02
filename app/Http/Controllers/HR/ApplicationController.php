<?php

namespace App\Http\Controllers\HR;

use Illuminate\Http\Request;
use App\Models\Helper\Division;
use App\Mail\ApplicationSubmitted;
use App\Models\Applicant\Applicant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Applicant\ApplicationForm;

class ApplicationController extends Controller
{
    /**
     * Return the application status page
     * 
     * @return \Illuminate\Http\Response
     */
    public function status()
    {
        $applicant = Applicant::where('id', Auth::user()->id)->first();

        return view('application.status', [
            'applicant' => $applicant
        ]);
    }

    /**
     * Return the form page
     * 
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        $applicant = Applicant::where('id', Auth::user()->id)->first();
        $divisions = Division::get();

        return view('application.form', [
            'applicant' => $applicant,
            'divisions' => $divisions
        ]);
    }

    /**
     * Store a form
     * 
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function createForm(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric|min:15',
            'dob' => 'required|date',
            'join_reason' => 'required',
            'previous_community' => 'required',
            'division' => 'required|numeric|exists:divisions,id'
        ]);

        $applicationForm = new ApplicationForm();
        $applicationForm->applicant_id = Auth::user()->id;
        $applicationForm->age = $request->age;
        $applicationForm->dob = $request->dob;
        $applicationForm->join_reason = $request->join_reason;
        $applicationForm->division_id = $request->division;
        $applicationForm->previous_community = $request->previous_community;
        $applicationForm->save();

        Mail::to(Auth::user()->email)->queue(new ApplicationSubmitted($applicationForm->applicant));

        return redirect()->route('application.status')->with('success', 'formComplete');
    }
}
