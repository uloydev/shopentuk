<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->foreignId('user_id');
            $table->foreignId('user_address_id');
            $table->integer('shipping_price')->nullable();
            $table->integer('product_price')->nullable();
            $table->integer('price_total')->nullable();
            $table->integer('shipping_point')->nullable();
            $table->integer('product_point')->nullable();
            $table->integer('point_total')->nullable();
            $table->enum('status', ['unpaid', 'paid', 'canceled', 'refunded'])->default('unpaid');
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
}
