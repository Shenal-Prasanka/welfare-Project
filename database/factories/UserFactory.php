<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'mobile' => fake()->unique()->phoneNumber(),
            'address' => fake()->address(),
            'employee_no' => fake()->unique(),
            'regement_no' => fake()->unique(),
            'regement_id' => fake()->numberBetween(1, 40),
            'unit_id' => fake()->numberBetween(1, 40),
            'rank_id' => fake()->numberBetween(1, 40),
            'email_verified_at' => now(),
            'role' => fake()->numberBetween(1, 3), // assuming roles like 1 = admin, 2 = clerk, etc.
            'active' => fake()->boolean(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
