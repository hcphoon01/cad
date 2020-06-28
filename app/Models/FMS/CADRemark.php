<?php

namespace App\Models\FMS;

use Illuminate\Database\Eloquent\Model;

class CADRemark extends Model
{
  /**
   * Specify the CAD remarks table
   */
  protected $table = 'cad_remarks';

  /**
   * Return the CAD the remark belongs to
   */
  public function cad()
  {
    return $this->belongsTo('App\Models\FMS\CAD', 'cad_id', 'id');
  }

  /**
   * Conditionally return the unit that created the remark
   */
  public function unit()
  {
    return $this->belongsTo('App\Models\FMS\Unit', 'unit_id', 'id');
  }

  /**
   * Conditionally return the controller that created the remark
   */
  public function controller()
  {
    return $this->belongsTo('App\Models\FMS\ControllerModel', 'controller_id', 'id');
  }
}
