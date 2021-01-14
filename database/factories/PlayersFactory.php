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
            'player_id' => $this->faker->word,
            'player_name' => $this->faker->name,
            'player_role' => $this->faker->word,
            'user_id' => 1,
        ];
    }
}
