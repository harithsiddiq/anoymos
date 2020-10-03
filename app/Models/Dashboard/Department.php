<?php

namespace App\Models\Dashboard;

use App\Observers\DepartmentObserver;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    protected $with = 'children';

    public static function boot()
    {
        parent::boot();
        Department::observe(DepartmentObserver::class);
    }

    public function parents()
    {
        return $this->hasMany('App\Model\Dashboard\Department', 'id', 'parent');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
