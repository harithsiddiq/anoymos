<?php

use App\Dashboard\Setting;
use Illuminate\Database\Seeder;

class SettingTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
           'sitename_ar' => 'سناب تك',
           'sitename_en' => 'snap tech',
           'logo' => '',
           'icon' => '',
           'email' => 'snapTech@gmail.com',
           'main_lang' => 'ar',
           'description' => 'Electronic store',
           'keywords' => 'snap tech snapy',
           'status' => 'open',
           'message_maintenance' => '',
           'created_at' => \Carbon\Carbon::now(),
           'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
