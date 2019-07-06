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
            $table->integer('match_id');
            // $table->string('match_no');
            $table->string('team_id');
            $table->string('player_id'); 

            $table->integer('bt_runs')->default(0);
            $table->integer('bt_balls')->default(0);
            $table->integer('bt_fours')->default(0);
            $table->integer('bt_sixes')->default(0);
            $table->string('bt_status')->default('DNB');
            
            // $table->string('bw_status')->default('DNB');
            // $table->float('bw_overs',2,1)->default(0);
            // $table->integer('bw_wickets')->default(0);
            // $table->integer('bw_runs')->default(0);
            // $table->integer('bw_maiden')->default(0);
            // $table->integer('bw_nb')->default(0);
            // $table->integer('bw_wide')->default(0);

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
