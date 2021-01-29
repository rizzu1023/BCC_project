<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Tournament::factory()->create();
        \App\Teams::factory(10)->create();
        \App\Players::factory(60)->create();

    }
}
