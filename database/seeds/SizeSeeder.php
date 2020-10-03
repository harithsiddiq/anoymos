<?php

use Illuminate\Database\Seeder;
use \App\Models\Dashboard\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Size::class, 4)->create();
    }
}
