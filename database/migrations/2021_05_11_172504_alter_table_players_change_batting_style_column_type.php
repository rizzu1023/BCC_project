<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePlayersChangeBattingStyleColumnType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('batting_style');
            $table->dropColumn('bowling_style');
            $table->unsignedTinyInteger('role_id')->after('last_name');
            $table->unsignedTinyInteger('batting_style_id')->after('role_id');
            $table->unsignedTinyInteger('bowling_style_id')->nullable()->after('batting_style_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->string('role');
            $table->string('batting_style');
            $table->string('bowling_style');
            $table->dropColumn(['role_id', 'batting_style_id', 'bowling_style_id']);
        });
    }
}
