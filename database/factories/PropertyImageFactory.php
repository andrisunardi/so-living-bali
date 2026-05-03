<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyImageFactory extends Factory
{
    public function definition(): array
    {
        $property = Property::first() ?? Property::factory()->create();

        return [
            'property_id' => $property->id,
            'name' => fake()->name(),
            'google_file_id' => fake()->uuid(),
            'image_url' => fake()->imageUrl(),
            'position' => fake()->numberBetween(1, 255),
        ];
    }
}
