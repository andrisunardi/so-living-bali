<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'contact_id' => fake()->unique()->uuid(),
            'name' => fake()->name(),
            'company' => fake()->name(),
            'email' => fake()->freeEmail(),
            'phone' => fake()->phoneNumber(),
        ];
    }
}
