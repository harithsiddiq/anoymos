<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'country_name_ar' => $faker->word(),
        'country_name_en' => $faker->word(),
        'mob' => $faker->phoneNumber,
        'code' => $faker->countryCode,
        'logo' => '',
    ];
});
