<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];

    protected $with = ['country', 'city'];

    public function country()
    {
        return $this->belongsTo('App\Models\Dashboard\Country');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\Dashboard\City');
    }
}
