<?php

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Country;

class CountryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Country::class,5)->create();
    }
}
