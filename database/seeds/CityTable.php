<?php

use Illuminate\Database\Seeder;

class CityTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Dashboard\City',5)->create();
    }
}
