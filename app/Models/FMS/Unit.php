<?php

namespace App\Models\FMS;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    /**
	 * Get the users associated with the unit
	 */
	public function users()
	{
		return $this->hasMany('App\Models\User\User');
	}
}
