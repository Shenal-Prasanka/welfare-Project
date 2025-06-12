<?php

namespace Database\Factories;
use App\Models\Regement;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Regement>
 */
class RegementFactory extends Factory
{
        protected $model = Regement::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() 
    {
        return [
            'regement' => $this->faker->word,
            'active' => $this->faker->randomElement([0, 1]),
            
        ];
    }
}
