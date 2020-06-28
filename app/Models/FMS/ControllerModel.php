<?php

namespace App\Models\FMS;

use Illuminate\Database\Eloquent\Model;

class ControllerModel extends Model
{
    /**
     * Specify the Controller table
     */
    protected $table = 'controllers';

    /**
     * Return the user model from the controller
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }

    /**
     * Return the callsign belonging to the controller
     */
    public function callsign()
    {
        return $this->belongsTo('App\Models\Helper\Callsign');
    }
}
