<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Dashboard\Shipping;
use Faker\Generator as Faker;

$factory->define(Shipping::class, function (Faker $faker) {
    return [
        'name_ar' => $faker->name('mail'),
        'name_en' => $faker->name('fe mail'),
        'user_id' => \App\User::find($faker->numberBetween(1,2))
    ];
});
