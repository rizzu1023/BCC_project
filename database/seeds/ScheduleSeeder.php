<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('schedules')->truncate();
        DB::table('schedules')->insert([
            'match_no' => 1,
            'team1_id' => 1,
            'team2_id' => 2,
            'times' => '20:00:00',
            'dates' => '2019-12-12',
            'tournament_id' => 1,
        ]);
        DB::table('schedules')->insert([
            'match_no' => 2,
            'team1_id' => 3,
            'team2_id' => 4,
            'times' => '20:00:00',
            'dates' => '2019-12-12',
            'tournament_id' => 1,
        ]);
        DB::table('schedules')->insert([
            'match_no' => 3,
            'team1_id' => 1,
            'team2_id' => 4,
            'times' => '20:00:00',
            'dates' => '2019-12-12',
            'tournament_id' => 1,
        ]);
        DB::table('schedules')->insert([
            'match_no' => 4,
            'team1_id' => 2,
            'team2_id' => 3,
            'times' => '20:00:00',
            'dates' => '2019-12-12',
            'tournament_id' => 1,
        ]);
        DB::table('schedules')->insert([
            'match_no' => 5,
            'team1_id' => 1,
            'team2_id' => 3,
            'times' => '20:00:00',
            'dates' => '2019-12-12',
            'tournament_id' => 1,
        ]);
        DB::table('schedules')->insert([
            'match_no' => 6,
            'team1_id' => 2,
            'team2_id' => 4,
            'times' => '20:00:00',
            'dates' => '2019-12-12',
            'tournament_id' => 1,
        ]);
        DB::table('schedules')->insert([
            'match_no' => 7,
            'team1_id' => 5,
            'team2_id' => 6,
            'times' => '20:00:00',
            'dates' => '2019-12-12',
            'tournament_id' => 1,
        ]);
        DB::table('schedules')->insert([
            'match_no' => 8,
            'team1_id' => 7,
            'team2_id' => 8,
            'times' => '20:00:00',
            'dates' => '2019-12-12',
            'tournament_id' => 1,
        ]);
        DB::table('schedules')->insert([
            'match_no' => 8,
            'team1_id' => 5,
            'team2_id' => 8,
            'times' => '20:00:00',
            'dates' => '2019-12-12',
            'tournament_id' => 1,
        ]);
        DB::table('schedules')->insert([
            'match_no' => 10,
            'team1_id' => 6,
            'team2_id' => 7,
            'times' => '20:00:00',
            'dates' => '2019-12-12',
            'tournament_id' => 1,
        ]);
        DB::table('schedules')->insert([
            'match_no' => 11,
            'team1_id' => 5,
            'team2_id' => 7,
            'times' => '20:00:00',
            'dates' => '2019-12-12',
            'tournament_id' => 1,
        ]);
        DB::table('schedules')->insert([
            'match_no' => 12,
            'team1_id' => 6,
            'team2_id' => 8,
            'times' => '20:00:00',
            'dates' => '2019-12-12',
            'tournament_id' => 1,
        ]);

    }
}
