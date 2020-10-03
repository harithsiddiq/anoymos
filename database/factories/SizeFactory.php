<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Dashboard\Size;
use Faker\Generator as Faker;

$factory->define(Size::class, function (Faker $faker) {
    return [
        'name_ar' => $faker->numberBetween(4,15). 'بوصه',
        'name_en' => $faker->numberBetween(4,15). 'inche',
        'department_id' => \App\Models\Dashboard\Department::first(),
        'is_public' => 'yes'
    ];
});
