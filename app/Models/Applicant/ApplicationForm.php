<?php

namespace App\Models\Applicant;

use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'applicant_id', 'division_id', 'join_reason', 'age', 'dob', 'previous_community'
    ];

    /**
     * The applicant who made the form
     */
    public function applicant()
    {
        return $this->belongsTo('App\Models\Applicant\Applicant');
    }
}
