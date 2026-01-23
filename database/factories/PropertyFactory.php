<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PropertyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code' => Str::random(10),
            'name' => fake()->name(),
            'address' => fake()->address(),
        ];
    }
}
