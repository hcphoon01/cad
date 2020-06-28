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

    // /**
    //  * Return the unit that created the remark
    //  */
    // public function unit()
    // {
    //     return $this->belongsTo('App\Models\FMS\Unit', 'unit_id', 'id');
    // }

    /**
     * Conditionally return the unit that created the remark
     */
    public function unit()
    {
        if($this->type == 'controller') {
            return $this->belongsTo('App\Models\FMS\Controller', 'unit_id', 'id');
        } elseif ($this->type == 'unit') {
            return $this->belongsTo('App\Models\FMS\Unit', 'unit_id', 'id');
        }
    }
}
