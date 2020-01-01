<?php

namespace App\Models\Event;

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
}
