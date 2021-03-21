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
            $table->integer('shipping_price')->default(0);
            $table->integer('shipping_point')->default(0);
            $table->integer('product_price')->nullable();
            $table->integer('price_total')->nullable();
            $table->integer('product_point')->nullable();
            $table->integer('point_total')->nullable();
            $table->integer('weight_total')->default(0);
            $table->integer('voucher_discount')->nullable();
            $table->string('no_resi')->nullable();
            $table->enum('status', [
                'unpaid', 'paid', 'shipping', 'canceled', 'refunding', 'refunded', 'finished'
            ])->default('unpaid');
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
