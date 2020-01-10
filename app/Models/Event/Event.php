<?php

namespace App\Models\Event;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'start_time', 'end_time'
    ];

    /**
     * Return the display datetime
     * 
     * @return string
     */
    public function displayDateTime()
    {
        $start = $this->start_time->format('H:i');
        $end = $this->end_time->format('H:i');
        
        return $start . ' - ' . $end;
    }

    /**
     * Return the participants for the event
     */
    public function participants()
    {
        return $this->hasMany('App\Models\Event\EventParticipant');
    }

    /**
     * Return if the user is a participant
     * @param User $user
     * 
     * @return boolean
     */
    public function isParticipant(User $user)
    {
        return $this->participants->contains('user_id', $user->id);
    }
}
