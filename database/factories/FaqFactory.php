<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Stichoza\GoogleTranslate\GoogleTranslate;

class FaqFactory extends Factory
{
    public function definition(): array
    {
        $question = fake()->unique()->sentence();
        $answer = fake()->paragraph();

        return [
            'question' => $question,
            'question_id' => (new GoogleTranslate('id'))->translate($question),
            'question_fr' => (new GoogleTranslate('fr'))->translate($question),
            'answer' => $answer,
            'answer_id' => (new GoogleTranslate('id'))->translate($answer),
            'answer_fr' => (new GoogleTranslate('fr'))->translate($answer),
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
