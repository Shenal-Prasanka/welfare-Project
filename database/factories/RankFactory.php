<?php

namespace Database\Factories;

use App\Models\Rank;
use Illuminate\Database\Eloquent\Factories\Factory;

class RankFactory extends Factory
{
    protected $model = Rank::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rank' => $this->faker->word,
            'type' => $this->faker->randomElement(['type1', 'type2', 'type3']),
            'active' => $this->faker->randomElement([0, 1]),
        ];
    }
}