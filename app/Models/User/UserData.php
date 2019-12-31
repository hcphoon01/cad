<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'shoulder_number', 'last_patrol', 'gc_commendation',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'gc_commendation' => 'boolean',
    ];

    /**
     * Get the user that the data belongs to.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }
}
