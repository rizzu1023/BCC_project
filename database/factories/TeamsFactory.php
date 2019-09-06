<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Teams::class, function (Faker $faker) {
    return [
        'team_code' => $faker->word,
        'team_name' => $faker->name,
        'team_title' => 0,
    ];
});
