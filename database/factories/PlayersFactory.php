<?php

namespace Database\Factories;

use App\Players;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Players::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'player_id' => $this->faker->numberBetween($min=1000,$max=9999),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'role' => $this->faker->randomElement($array = array('Batsman','Bowler','WK-Batsman','Batting Allrounder', 'Bowling Allrounder')),
            'batting_style' => $this->faker->randomElement($array = array('Right Hand Batsman','Left Hand Batsman')),
            'bowling_style' => $this->faker->randomElement($array = array('Right-arm Fast', 'Left-arm Fast', 'Right-arm Legbreak','Left-arm Offbreak')),
            'dob' => $this->faker->date($format = 'Y-m-d',$max = 'now'),
            'user_id' => 1,
        ];
    }
}
