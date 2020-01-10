<?php

namespace App\Models\Helper;

use Illuminate\Database\Eloquent\Model;

class Callsign extends Model
{
    /**
     * Return the division the callsign belongs to
     */
    public function division() 
    {
        return $this->belongsTo('App\Models\Helper\Division');
    }
}
