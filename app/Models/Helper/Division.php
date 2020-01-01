<?php

namespace App\Models\Helper;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_open' => 'boolean',
        'is_active' => 'boolean'
    ];
}
