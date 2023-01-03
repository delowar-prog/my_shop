<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->string('product_code')->nullable();
            $table->string('product_details');
            $table->string('product_image_one')->nullable();
            $table->string('product_image_two')->nullable();
            $table->string('product_image_three')->nullable();
            $table->string('product_price');
            $table->string('discount_price')->nullable();
            $table->integer('slider')->nullable();
            $table->integer('banner')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('new')->nullable();
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
};
