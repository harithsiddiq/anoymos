<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('photo');
            $table->string('content');
            $table->unsignedInteger('stoke')->default(0);
            $table->decimal('price',5,2);
            $table->decimal('special_price',5,2)->nullable();
            $table->date('sp_start')->comment('special_price_start_date')->nullable();
            $table->date('sp_end')->comment('special_price_end_date')->nullable();
            $table->enum('status', ['approval', 'pending', 'reject'])->default('pending');
            $table->longText('reason')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('Manufacturer_id')->nullable();
            $table->unsignedInteger('mall_id')->nullable();
            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedInteger('size_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('manufacturer_id')->references('id')->on('manufacthrers');
            $table->foreign('mall_id')->references('id')->on('malls');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
