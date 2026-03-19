<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OauthFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code' => fake()->unique()->username(),
            'name' => fake()->unique()->name(),
            'refresh_token' => fake()->uuid(),
            'access_token' => fake()->uuid(),
            'expires_in' => fake()->numberBetween(),
            'scope' => fake()->sentences(),
            'created' => fake()->numberBetween(),
        ];
    }
}
