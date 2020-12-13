<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('name')->unique();
            $table->string('email');
            $table->string('phone');
            $table->text('street_address')->unique();
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->boolean('is_main_address');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('user_addresses');
    }
}
