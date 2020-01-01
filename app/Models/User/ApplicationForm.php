<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'applicant_id', 'division_id', 
    ];
}
