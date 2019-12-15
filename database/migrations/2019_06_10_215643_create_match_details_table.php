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
            // $table->float('overs_played',3,1)->default(0);
            $table->integer('over')->default(0);
            $table->integer('overball')->default(0);
            $table->integer('no_ball')->default(0);

            $table->string('isBatting');
            $table->integer('wide')->default(0);
            $table->integer('byes')->default(0);
            $table->integer('legbyes')->default(0);
            $table->string("tournament");
            $table->integer('isOver')->default(0);
            $table->integer('isWicket')->default(0);
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
