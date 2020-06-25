<?php

namespace App\Models\FMS;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CAD extends Model
{
    /**
     * Specify the CAD table
     */
    protected $table = 'cads';

    /**
     * Return the display name for the CAD
     */
    public function displayName()
    {
        $date = Carbon::parse($this->created_at)->format('Ymd');
        $number = CAD::whereDate('created_at', Carbon::today())->count();
    }

    /**
     * Return the units attached to the CAD
     */
    public function units()
    {
        return $this->hasMany('App\Models\FMS\Unit', 'assigned_cad');
    }

    /**
     * Return the remarks created about the CAD
     */
    public function remarks()
    {
        return $this->hasMany('App\Models\FMS\CADRemark', 'cad_id', 'id');
    }
}
