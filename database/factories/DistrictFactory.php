<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DistrictFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
            'is_show' => fake()->boolean(),
            'is_active' => fake()->boolean(),
        ];
    }

    public function show(): static
    {
        return $this->state(fn () => ['is_show' => true]);
    }

    public function notShown(): static
    {
        return $this->state(fn () => ['is_show' => false]);
    }

    public function active(): static
    {
        return $this->state(fn () => ['is_active' => true]);
    }

    public function inActive(): static
    {
        return $this->state(fn () => ['is_active' => false]);
    }
}
