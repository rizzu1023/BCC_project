<?php

namespace Database\Factories;

use App\Tournament;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tournament::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tournament_name' => 'CWC19',
            'user_id' => 1,
            'start_date' => '2010/10/10',
            'end_date' => '2020/10/10',
        ];
    }
}
