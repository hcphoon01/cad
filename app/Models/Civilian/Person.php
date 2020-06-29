<?php

namespace App\Models\Civilian;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  protected $casts = [
    'aliases' => 'array'
  ];

  /**
   * Return all the markers associated to a civ
   */
  public function markers()
  {
    return $this->belongsToMany('App\Models\Helper\Markers', 'civ_vehicles', 'person_id', 'marker_id');
  }

  /**
   * Return the vehicle associated to a civ
   */
  public function vehicle()
  {
    return $this->hasOne('App\Models\Civilian\Vehicle', 'id', 'civ_id');
  }
}
