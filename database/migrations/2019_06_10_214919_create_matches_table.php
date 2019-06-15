<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('match_no')->unique();
            $table->integer('team1_id');
            $table->integer('team2_id');
            $table->string('overs');
            $table->string('toss');
            $table->string("choose");
            $table->string('won')->default('--');
            $table->string('description')->default('--');
            $table->string('mom')->default('--');
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
        Schema::dropIfExists('matches');
    }
}
