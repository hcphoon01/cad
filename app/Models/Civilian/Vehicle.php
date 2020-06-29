<?php

namespace App\Models\Civilian;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
  protected $table = 'civ_vehicles';

  protected $casts = [
    'named_drivers' => 'array'
  ];

  /**
   * Return the civ associated to a vehicle
   */
  public function civ()
  {
    return $this->belongsTo('App\Models\Civilian\Person', 'civ_id', 'id');
  }
}
