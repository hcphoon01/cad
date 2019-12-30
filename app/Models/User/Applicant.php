<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'qc_review', 'hr_review', 'interview',
    ];

    /**
     * Get the user that the applicant belongs to.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }
}
