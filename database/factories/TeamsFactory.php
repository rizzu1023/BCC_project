<?php


namespace Database\Factories;

use App\Teams;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teams::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'team_code' => $this->faker->countryCode,
            'team_name' => $this->faker->country,
            'tournament_id' => 1,
            'user_id' => 1,
        ];
    }
}

