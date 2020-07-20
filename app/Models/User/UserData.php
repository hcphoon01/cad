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
    'user_id', 'shoulder_number', 'last_patrol', 'division_id',
  ];

  /**
   * Get the user that the data belongs to.
   */
  public function user()
  {
    return $this->belongsTo('App\Models\User\User');
  }

  /**
   * Get the division the user is a part of
   */
  public function division()
  {
    return $this->belongsTo('App\Models\Helper\Division', 'division_id', 'id');
  }

  /**
   * Get the last patrol of the user
   */
  public function lastPatrol()
  {
    return $this->belongsTo('App\Models\Event\Event', 'last_patrol', 'id');
  }
}
