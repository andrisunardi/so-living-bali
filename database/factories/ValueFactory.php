<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ValueFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(),
            'title_id' => fake()->unique()->sentence(),
            'title_zh' => fake()->unique()->sentence(),
            'short_description' => fake()->paragraph(),
            'short_description_id' => fake()->paragraph(),
            'short_description_zh' => fake()->paragraph(),
            'description' => fake()->paragraph(),
            'description_id' => fake()->paragraph(),
            'description_zh' => fake()->paragraph(),
            'icon' => 'fas fa-icons',
            'is_active' => fake()->boolean(),
        ];
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
