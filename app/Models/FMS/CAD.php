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
}
