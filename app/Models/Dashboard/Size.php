<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $guarded = [];

    protected $with = 'department';

    public function department()
    {
        return $this->belongsTo('App\Models\Dashboard\Department');
    }
}
