<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->datetime('started_at');
            $table->datetime('ended_at');
            $table->enum('status', ['playing', 'queued', 'finished'])->default('queued');
            $table->foreignId('winner_option_id')->nullable();
            $table->integer('point_in')->default(0);
            $table->integer('point_out')->default(0);
            $table->boolean('is_custom')->default(false);
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
        Schema::dropIfExists('games');
    }
}
