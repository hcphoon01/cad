<?php

namespace App\Models\Helper;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
  public $fillable = [
    'model',
    'make',
    'status',
    'class',
    'return',
    'vrm',
    'division_id'
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'status' => 'boolean'
  ];

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['return'];

  /**
   * Return the display name for the vehicle
   */
  public function displayName()
  {
    return $this->make . ' ' . $this->model;
  }

  /**
   * Return the unit assigned to the vehicle
   */
  public function unit()
  {
    return $this->belongsTo('App\Models\FMS\Unit', 'id', 'vehicle_id');
  }

  /**
   * Return the division assigned to the vehicle
   */
  public function division()
  {
    return $this->belongsTo('App\Models\Helper\Division', 'division_id', 'id');
  }
}
