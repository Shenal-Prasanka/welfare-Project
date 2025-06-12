<?php

namespace Database\Factories;
use App\Models\Welfare;
use Illuminate\Database\Eloquent\Factories\Factory;

class WelfareFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'active' => $this->faker->randomElement([0, 1]),
        ];
    }
}
