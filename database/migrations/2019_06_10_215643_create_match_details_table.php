<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('match_id');
            // $table->string('match_no');
            $table->integer('team_id');
            $table->integer('score')->default(0);
            $table->integer('wicket')->default(0);
            $table->string('overs_played')->default(0);
            $table->integer('no_ball')->default(0);
            $table->integer('wide')->default(0);
            $table->integer('byes')->default(0);
            $table->integer('legbyes')->default(0);
            $table->string("tournament");
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
        Schema::dropIfExists('match_details');
    }
}
