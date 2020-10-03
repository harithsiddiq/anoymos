<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $guarded = [];

    protected $with = 'user';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
