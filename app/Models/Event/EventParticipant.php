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
}
