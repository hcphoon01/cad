<?php

namespace App\Models\Helper;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    /**
     * Get the users that have the qualifcation
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User\User', 'qualification_user', 'qualification_id', 'user_id');
    }
}
