<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $fillable = [
        'title',
        'photo',
        'content',
        'stork',
        'price',
        'special_price',
        'sp_start',
        'sp_end',
        'status',
        'reason',
        'department_id',
        'brand_id',
        'mall_id',
        'color_id',
        'size_id',
    ];

    protected $dates = ['deleted_at'];

}
