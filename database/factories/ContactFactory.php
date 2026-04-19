<?php

namespace Database\Factories;

use App\Enums\Property\PropertyBedroom;
use App\Enums\Property\PropertyRentalType;
use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    public function definition(): array
    {
        $area = Area::first() ?? Area::factory()->hotel()->create();

        return [
            'code' => Str::random(20),
            'name' => fake()->name(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'company' => fake()->company(),
            'email' => fake()->freeEmail(),
            'phone' => fake()->phoneNumber(),
            'area_id' => $area->id,
            'bedroom' => fake()->randomElement(PropertyBedroom::cases()),
            'rental_type' => fake()->randomElement(PropertyRentalType::cases()),
            'message' => fake()->paragraph(),
        ];
    }
}
