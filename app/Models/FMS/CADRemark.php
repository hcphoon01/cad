<?php

namespace App\Models\FMS;

use Illuminate\Database\Eloquent\Model;

class CADRemark extends Model
{
    /**
     * Specify the CAD remarks table
     */
    protected $table = 'cads';

    /**
     * Return the CAD the remark belongs to
     */
    public function cad()
    {
        $this->belongsTo('App\Models\FMS\CAD', 'cad_id', 'id');
    }

    /**
     * Return the unit that created the remark
     */
    public function unit()
    {
        $this->belongsTo('App\Models\FMS\Unit');
    }
}
