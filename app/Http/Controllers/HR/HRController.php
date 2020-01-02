<?php

namespace App\Http\Controllers\HR;

use Illuminate\Http\Request;
use App\Mail\InterviewInvite;
use App\Models\Applicant\Applicant;
use App\Http\Controllers\Controller;
use App\Mail\ApplicationProgress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $interviews = Applicant::where('hr_review', true)->get();

        return view('hr.index', [
            'gcReview' => $gcReview,
            'hrReview' => $hrReview,
            'interviews' => $interviews
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

    /**
     * Progress an applicant to the next stage
     * 
     * @param Applicant $applicant
     * 
     * @return \Illuminate\Http\Response
     */
    public function progress(Applicant $applicant)
    {
        if ($applicant->hr_review) {
            $applicant->interview = true;
            $applicant->save();

            Mail::to(Auth::user()->email)->queue(new InterviewInvite($applicant));

            $applicant->user()->assignRole('Member');
            $applicant->user()->removeRole('Applicant');

            return redirect()->back();

        } elseif ($applicant->gc_review) {
            $applicant->hr_review = true;
            $applicant->save();

            Mail::to(Auth::user()->email)->queue(new ApplicationProgress($applicant));

            return redirect()->back();

        } elseif (!$applicant->gc_review) {
            $applicant->gc_review = true;
            $applicant->save();

            Mail::to(Auth::user()->email)->queue(new ApplicationProgress($applicant));

            return redirect()->back();

        }
    }
}
