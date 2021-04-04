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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
            'image_path' => 'default.png',
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
