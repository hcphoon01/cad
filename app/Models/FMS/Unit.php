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
		return $this->hasMany('App\Models\User\UserData');
	}

	/**
	 * Get the cad the unit belongs to
	 */
	public function cad()
	{
		return $this->belongsTo('App\Models\FMS\CAD');
	}

	/**
	 * Get the vehicle assigned to the unit
	 */
	public function vehicle()
	{
		return $this->hasOne('App\Models\Helper\Vehicle', 'id', 'vehicle_id');
	}

	/**
	 * Get the remarks the unit has created
	 */
	public function remarks()
	{
		return $this->hasMany('App\Models\FMS\CADRemark');
	}
}
