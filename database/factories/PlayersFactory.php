<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Players::class, function (Faker $faker) {
    return [
        'player_id' => $faker->word,
        'player_name' => $faker->name,
        'player_role' => $faker->word,
        'team_id' => $faker->numberBetween(1,4),
    ];
});
