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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('pro_id');
            $table->string('user_id');
            $table->string('customer_name');
            $table->text('customer_address');
            $table->string('customer_phone');
            $table->string('customer_email');
            $table->string('customer_city');
            $table->string('pro_name');
            $table->string('pro_image');
            $table->string('pro_qty');
            $table->string('subtotal');
            $table->string('total');
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
        Schema::dropIfExists('orders');
    }
};
