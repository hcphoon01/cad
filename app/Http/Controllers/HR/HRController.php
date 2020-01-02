<?php

namespace App\Http\Controllers\HR;

use Illuminate\Http\Request;
use App\Models\Applicant\Applicant;
use App\Http\Controllers\Controller;

class HRController extends Controller
{
    /**
     * Return the index page
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gcReview = Applicant::where('gc_review', false)->get();
        $hrReview = Applicant::where('gc_review', true)->get();
        $interview = Applicant::where('hr_review', true)->get();

        return view('hr.index', [
            'gcReview' => $gcReview,
            'hrReview' => $hrReview,
            'interview' => $interview
        ]);
    }

    /**
     * Return the user page
     * 
     * @param string $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $applicant = Applicant::where('id', $id)->first();

        return view('hr.applicant', [
            'applicant' => $applicant
        ]);
    }
}
