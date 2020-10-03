<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('sitename_ar');
            $table->string('sitename_en');
            $table->string('logo');
            $table->string('icon');
            $table->string('email');
            $table->string('main_lang')->default('ar');
            $table->longText('description');
            $table->longText('keywords');
            $table->enum('status', ['open', 'close'])->default('open');
            $table->longText('message_maintenance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
