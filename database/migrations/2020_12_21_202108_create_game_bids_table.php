<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_bids', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['playing', 'win', 'lose'])->default('playing');
            $table->foreignId('game_option_id');
            $table->foreignId('game_id');
            $table->foreignId('user_id');
            $table->integer('point');
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
        Schema::dropIfExists('game_bids');
    }
}
