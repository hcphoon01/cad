<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'posted_by', 'title', 'body',
    ];

    /**
     * The user that created the announcement
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User\User', 'posted_by');
    }
}
