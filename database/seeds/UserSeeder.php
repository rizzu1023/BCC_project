<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Mohammed Rizwan',
            'email' => 'mrizwan9022@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
            'is_active' => 1,
            'is_super_admin' => 1,
            'user_type' => 'super-admin',
        ]);
    }
}
