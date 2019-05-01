<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBowlingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bowlings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('player_id')->unique();
            $table->integer('bw_matches')->default(0);
            $table->integer('bw_innings')->default(0);
            $table->integer('bw_balls')->default(0);
            $table->integer('bw_wickets')->default(0);
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
        Schema::dropIfExists('bowlings');
    }
}
