<?php

namespace App\Models\Applicant;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'gc_review', 'hr_review', 'interview',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'gc_review' => 'boolean',
        'hr_review' => 'boolean',
        'interview' => 'boolean',
    ];

    /**
     * Get the user that the applicant belongs to.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }

    /**
     * Return the stage of the application process the applicant is.
     */
    public function applicationStage()
    {
        if ($this->interview) {
            return '100';
        } elseif ($this->hr_review) {
            return '75';
        } elseif ($this->gc_review) {
            return '50';
        } elseif ($this->form) {
            return '25';
        }
    }

    /**
     * Return the long text for the stage of the application process the applicant is.
     */
    public function applicationStageTextLong()
    {
        if ($this->interview) {
            return 'Congratulations, you have been accepted into EmergencyRP';
        } elseif ($this->hr_review) {
            return 'Congratulations, you have been invited for an interview.';
        } elseif ($this->gc_review) {
            return 'Your application is undergoing a review by HR';
        } elseif ($this->form) {
            return 'Your application is undergoing a review by Gold Command';
        } else {
            return 'You have not yet submitted an application form. Please click the button below to get started.';
        }
    }

    /**
     * Return the long text for the stage of the application process the applicant is.
     */
    public function applicationStageText()
    {
        if ($this->interview) {
            return 'Accepted';
        } elseif ($this->hr_review) {
            return 'Interview';
        } elseif ($this->gc_review) {
            return 'HR Review';
        } elseif ($this->form) {
            return 'GC Review';
        } else {
            return 'No Form Submitted';
        }
    }

    /**
     * The application form the applicant filled out
     */
    public function form()
    {
        return $this->hasOne('App\Models\Applicant\ApplicationForm');
    }
}
