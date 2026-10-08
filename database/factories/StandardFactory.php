<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Stichoza\GoogleTranslate\GoogleTranslate;

class StandardFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->unique()->sentence();
        $description = fake()->paragraph();

        return [
            'title' => $title,
            'title_id' => (new GoogleTranslate('id'))->translate($title),
            'title_fr' => (new GoogleTranslate('fr'))->translate($title),
            'description' => $description,
            'description_id' => (new GoogleTranslate('id'))->translate($description),
            'description_fr' => (new GoogleTranslate('fr'))->translate($description),
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
