<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('match_no');
            $table->string('team_id');
            $table->string('player_id'); 
            $table->integer('bt_runs')->default(0);
            $table->integer('bt_balls')->default(0);
            $table->integer('bt_fours')->default(0);
            $table->integer('bt_sixes')->default(0);
            $table->string('bt_status')->default('DNB');
            $table->string('tournament');
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
        Schema::dropIfExists('match_players');
    }
}
