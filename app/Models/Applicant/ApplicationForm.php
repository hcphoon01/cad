<?php

namespace App\Models\Applicant;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'applicant_id', 'division_id', 'join_reason', 'age', 'dob', 'previous_community', 'discord'
    ];

    /**
     * The applicant who made the form
     */
    public function applicant()
    {
        return $this->belongsTo('App\Models\Applicant\Applicant');
    }

    /**
     * The division the form is related to
     */
    public function division()
    {
        return $this->belongsTo('App\Models\Helper\Division');
    }

    /**
     * Formatted Date of Birth
     * 
     * @return string
     */
    public function formatDOB()
    {
        return Carbon::parse($this->dob)->format('d/m/Y');
    }
}
