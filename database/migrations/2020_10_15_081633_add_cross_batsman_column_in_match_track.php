<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCrossBatsmanColumnInMatchTrack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('match_tracks', function (Blueprint $table) {
            $table->string('wicket_type')->after('action')->nullable();
            $table->boolean('batsman_cross')->after('overball')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('match_tracks', function (Blueprint $table) {
            $table->dropColumn('wicket_type');
            $table->dropColumn('batsman_cross');
        });
    }
}
