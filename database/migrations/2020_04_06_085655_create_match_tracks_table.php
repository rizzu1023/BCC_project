<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_tracks', function (Blueprint $table) {
            $table->id();
            $table->integer('match_id');
            $table->integer('team_id');
            $table->string('player_id');
            $table->string('non_striker_id');
            $table->string('attacker_id');
            $table->integer('score');
            $table->integer('wickets');
            $table->string('action')->default('--');
            $table->integer('run');
            $table->integer('over');
            $table->integer('overball');
            $table->integer('tournament_id');
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
        Schema::dropIfExists('match_tracks');
    }
}
