<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    protected $with = 'country';

    public function country()
    {
        return $this->belongsTo('App\Models\Dashboard\Country');
    }
}
