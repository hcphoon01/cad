<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'event_id', 'user_id', 'division_id',
  ];

  /**
   * Return the participants for the event
   */
  public function user()
  {
    return $this->belongsTo('App\Models\User\User');
  }

  /**
   * Return the division for the participant
   */
  public function division()
  {
    return $this->belongsTo('App\Models\Helper\Division');
  }
}
