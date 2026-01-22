<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code' => Str::random(20),
            'name' => fake()->name(),
            'company' => fake()->company(),
            'email' => fake()->freeEmail(),
            'phone' => fake()->phoneNumber(),
        ];
    }
}
