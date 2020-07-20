<?php

namespace App\Models\User;

use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
  use Notifiable, HasRoles, HasApiTokens;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password', 'api_token', 'token',
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
    return $this->hasOne('App\Models\User\UserData', 'user_id', 'id');
  }

  /**
   * The applicant that belongs to the user.
   */
  public function applicant()
  {
    return $this->hasOne('App\Models\Applicant\Applicant');
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

  /**
   * Get the users qualifications
   */
  public function qualifications()
  {
    return $this->belongsToMany('App\Models\Helper\Qualification', 'qualification_user', 'user_id', 'qualification_id');
  }

  /**
   * Get the unit the user is assigned to
   */
  public function unit()
  {
    return $this->belongsTo('App\FMS\Unit');
  }
}
