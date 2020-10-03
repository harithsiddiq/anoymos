<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Dashboard\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'country_id' => 7,
        'city_name_ar' => $faker->city,
        'city_name_en' => $faker->city,
    ];
});
