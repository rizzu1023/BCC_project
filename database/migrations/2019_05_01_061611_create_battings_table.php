<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBattingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('player_id')->unique();
            $table->integer('bt_matches')->default(0);
            $table->integer('bt_innings')->default(0);
            $table->integer('bt_balls')->default(0);
            $table->integer('bt_fours')->default(0);
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
        Schema::dropIfExists('battings');
    }
}
