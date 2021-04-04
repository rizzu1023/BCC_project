<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('players')->truncate();
        DB::table('players')->insert([
            'player_id' => 'EM',

            'first_name' => 'Eoin',
            'last_name' => 'Morgan',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Offbreak',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'JR',

            'first_name' => 'Joe',
            'last_name' => 'Root',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'JRY',

            'first_name' => 'Jason',
            'last_name' => 'Roy',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'LL',

            'first_name' => 'Liam',
            'last_name' => 'Livingstone',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'DM',

            'first_name' => 'David',
            'last_name' => 'Malan',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'MAL',

            'first_name' => 'Moeen',
            'last_name' => 'Ali',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'BST',

            'first_name' => 'Ben',
            'last_name' => 'Stokes',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'CW',

            'first_name' => 'Chris',
            'last_name' => 'Woakes',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);


        DB::table('players')->insert([
            'player_id' => 'TCR',

            'first_name' => 'Tom',
            'last_name' => 'Curran',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'SMR',

            'first_name' => 'Sam',
            'last_name' => 'Curran',
            'role' => 'ALl Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'JBW',

            'first_name' => 'Jonny',
            'last_name' => 'Bairstow',
            'role' => 'Wicket Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'JBT',

            'first_name' => 'Jos',
            'last_name' => 'Buttler',
            'role' => 'Wicket Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        //INDIA  13-24

        DB::table('players')->insert([
            'player_id' => 'VK',

            'first_name' => 'Virat',
            'last_name' => 'Kohli',
            'role' => 'Batman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'RHS',

            'first_name' => 'Rohit',
            'last_name' => 'Sharma',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'SDW',

            'first_name' => 'Shikhar',
            'last_name' => 'Dhawan',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'SGL',

            'first_name' => 'Shubam',
            'last_name' => 'Gill',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'ARH',

            'first_name' => 'Ajinkya',
            'last_name' => 'Rahane',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'HPD',

            'first_name' => 'Hardik',
            'last_name' => 'Pandya',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'RJD',

            'first_name' => 'Ravindra',
            'last_name' => 'Jadeja',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'KLR',

            'first_name' => 'KL',
            'last_name' => 'Rahul',
            'role' => 'Wicket Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'RPT',

            'first_name' => 'Rishab',
            'last_name' => 'Pant',
            'role' => 'Wicket Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'MSM',

            'first_name' => 'Mohammed',
            'last_name' => 'Shami',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'JBM',

            'first_name' => 'Jasprit',
            'last_name' => 'Bumrah',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'MSJ',

            'first_name' => 'Mohammed',
            'last_name' => 'Siraj',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        // AUSTRALIA  25-36

        DB::table('players')->insert([
            'player_id' => 'AFC',

            'first_name' => 'Aaron',
            'last_name' => 'Finch',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'SSM',

            'first_name' => 'Steve',
            'last_name' => 'Smith',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'DWR',

            'first_name' => 'David',
            'last_name' => 'Warner',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'JOB',

            'first_name' => 'Joe',
            'last_name' => 'Burns',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'WPC',

            'first_name' => 'Will',
            'last_name' => 'Pocuvski',
            'role' => '',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'GMX',

            'first_name' => 'Glenn',
            'last_name' => 'Maxwell',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'CGN',

            'first_name' => 'Cameroon',
            'last_name' => 'Gareen',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'AXC',

            'first_name' => 'Alex',
            'last_name' => 'Carey',
            'role' => 'Wicket Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'TPN',

            'first_name' => 'Tim',
            'last_name' => 'Paine',
            'role' => 'Wicket Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'PCM',

            'first_name' => 'Pat',
            'last_name' => 'Cummins',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'MST',

            'first_name' => 'Mitchell',
            'last_name' => 'Starc',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'JSH',

            'first_name' => 'Josh',
            'last_name' => 'Hazlewood',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        //New zealand 37-48

        DB::table('players')->insert([
            'player_id' => 'MGT',

            'first_name' => 'Martin',
            'last_name' => 'Guptill',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'RTY',

            'first_name' => 'Ross',
            'last_name' => 'Taylor',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'KWL',

            'first_name' => 'Kane',
            'last_name' => 'Williomson',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'HNC',

            'first_name' => 'Henry ',
            'last_name' => 'Nicholas',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'JNS',

            'first_name' => 'James',
            'last_name' => 'Neesham',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'CMN',

            'first_name' => 'Colin',
            'last_name' => 'Munro',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'MSN',

            'first_name' => 'Mitchell',
            'last_name' => 'Santner',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'TLM',

            'first_name' => 'Tom',
            'last_name' => 'Latham',
            'role' => 'Wicket keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'TBL',

            'first_name' => 'Tom',
            'last_name' => 'Blundell',
            'role' => 'Wikcet Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'TBT',

            'first_name' => 'Trent',
            'last_name' => 'Bolt',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'MHR',

            'first_name' => 'Mat',
            'last_name' => 'Henry',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'TMS',

            'first_name' => 'Tim',
            'last_name' => 'Southee',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        //South Africa 49-60

        DB::table('players')->insert([
            'player_id' => 'FAF',

            'first_name' => 'Faf',
            'last_name' => 'Du Plessis',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'DMR',

            'first_name' => 'David',
            'last_name' => 'Miller',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'AMR',

            'first_name' => 'Aiden',
            'last_name' => 'Markram',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'JPD',

            'first_name' => 'Jean Paul',
            'last_name' => 'Duminy',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'APW',

            'first_name' => 'Andile',
            'last_name' => 'Phehlukwayo',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'CMR',

            'first_name' => 'Chris',
            'last_name' => 'Morris',
            'role' => 'ALl Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'DPT',

            'first_name' => 'Dwaine',
            'last_name' => 'Pretorius',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'QDK',

            'first_name' => 'Quinton',
            'last_name' => 'de Kock',
            'role' => 'Wicket Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'KRB',

            'first_name' => 'Kagiso',
            'last_name' => 'Rabada',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'LNG',

            'first_name' => 'Lungi',
            'last_name' => 'Ngidi',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'TSM',

            'first_name' => 'Tabraiz',
            'last_name' => 'Shamsi',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'ITH',

            'first_name' => 'Imran',
            'last_name' => 'Tahir',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        //WEST INDIES 61-72


        DB::table('players')->insert([
            'player_id' => 'DBR',

            'first_name' => 'Daren',
            'last_name' => 'Bravo',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'CGY',

            'first_name' => 'Chris',
            'last_name' => 'Gayle',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'ELW',

            'first_name' => 'Evin',
            'last_name' => 'Lewis',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'SHT',

            'first_name' => 'Shimron',
            'last_name' => 'Hetmyer',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'FAN',

            'first_name' => 'Fabian',
            'last_name' => 'Allen',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'JHD',

            'first_name' => 'Json',
            'last_name' => 'Holder',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'ARS',

            'first_name' => 'Andre',
            'last_name' => 'Russell',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'SHP',

            'first_name' => 'Shai',
            'last_name' => 'Hope',
            'role' => 'Wicket Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'NPR',

            'first_name' => 'Nicholas',
            'last_name' => 'Pooran',
            'role' => 'Wicket Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'SCR',

            'first_name' => 'Sheldon',
            'last_name' => 'Cottrell',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'SGB',

            'first_name' => 'Shannon',
            'last_name' => 'Gabriel',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'KMR',

            'first_name' => 'Kemar',
            'last_name' => 'Roach',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        //PAKISTAN 73-84

        DB::table('players')->insert([
            'player_id' => 'FZN',

            'first_name' => 'Fakhar',
            'last_name' => 'Zaman',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'IHQ',

            'first_name' => 'Imam-ul',
            'last_name' => 'Haq',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'BAM',

            'first_name' => 'Babar',
            'last_name' => 'Azam',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'ASA',

            'first_name' => 'Asif',
            'last_name' => 'Ali',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);
        DB::table('players')->insert([
            'player_id' => 'HSH',

            'first_name' => 'Haris',
            'last_name' => 'Sohail',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'MHF',

            'first_name' => 'Mohammed',
            'last_name' => 'Hafeez',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);
        DB::table('players')->insert([
            'player_id' => 'SBM',

            'first_name' => 'Shoiab ',
            'last_name' => 'Malik',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'MRZ',

            'first_name' => 'Mohammed',
            'last_name' => 'Rizwan',
            'role' => 'Wicket Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);
        DB::table('players')->insert([
            'player_id' => 'SRA',

            'first_name' => 'Sarfraz',
            'last_name' => 'Ahmed',
            'role' => 'Wicket Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'WRZ',

            'first_name' => 'Wahab',
            'last_name' => 'Riaz',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);
        DB::table('players')->insert([
            'player_id' => 'SFD',

            'first_name' => 'Shahid',
            'last_name' => 'Afridi',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'MAR',

            'first_name' => 'Mohammed',
            'last_name' => 'Amir',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);


        //SRI LANKA
        DB::table('players')->insert([
            'player_id' => 'LTM',

            'first_name' => 'Lahirr',
            'last_name' => 'Thrimanne',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'DKR',

            'first_name' => 'Dimuth',
            'last_name' => 'Karunaratne',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);


        DB::table('players')->insert([
            'player_id' => 'AFN',

            'first_name' => 'Aviska',
            'last_name' => 'Fernando',
            'role' => 'Batsman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'KMN',

            'first_name' => 'Kusal',
            'last_name' => 'Mendis',
            'role' => 'Batman',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);


        DB::table('players')->insert([
            'player_id' => 'AGM',

            'first_name' => 'Angelo',
            'last_name' => 'Mathews',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'TSR',

            'first_name' => 'Tisara',
            'last_name' => 'Perera',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'IUD',

            'first_name' => 'Isuru',
            'last_name' => 'Udana',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'JMN',

            'first_name' => 'Jeevan',
            'last_name' => 'Mendis',
            'role' => 'All Rounder',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'KPR',

            'first_name' => 'Kusal',
            'last_name' => 'Perera',
            'role' => 'Wicket Keeper',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'SLK',

            'first_name' => 'Suranga',
            'last_name' => 'Lakmal',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'LMG',

            'first_name' => 'Lasith',
            'last_name' => 'Malinga',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);

        DB::table('players')->insert([
            'player_id' => 'NPD',

            'first_name' => 'Nuwan',
            'last_name' => 'Pradeep',
            'role' => 'Bowler',
            'batting_style' => 'Right Hand Batsman',
            'bowling_style' => 'Right Arm Fast',
            'dob' => '2000-12-12',
            'user_id' => '1',
        ]);


    }
}
