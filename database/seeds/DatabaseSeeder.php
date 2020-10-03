<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
         $this->call(SettingTable::class);
         $this->call(CountryTable::class);
         $this->call(CityTable::class);
         $this->call(SizeSeeder::class);
    }
}
