<?php

namespace App\Models\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The data that belongs to the user.
     */
    public function data()
    {
        return $this->hasOne('App\Models\User\UserData');
    }

    /**
     * The applicant that belongs to the user.
     */
    public function applicant()
    {
        return $this->hasOne('App\Models\User\Applicant');
    }

    /**
     * The announcements that belong to the user.
     */
    public function announcements()
    {
        return $this->hasMany('App\Models\General\Announcement', 'posted_by');
    }

    /**
     * Get the display name for user
     * 
     * @return string
     */
    public function displayName()
    {
        $first_name = substr($this->name, 0, 1);
        $last_name = explode(' ', $this->name)[1];
        return $first_name . "." . $last_name;
    }
}
