<?php

namespace Database\Factories;

use App\Enums\Property\PropertyElectricity;
use App\Enums\Property\PropertyLivingStyle;
use App\Enums\Property\PropertyOperationalRisk;
use App\Enums\Property\PropertyOrientation;
use App\Enums\Property\PropertyPowerBackup;
use App\Enums\Property\PropertyPriceFlexibility;
use App\Enums\Property\PropertyRentalType;
use App\Enums\Property\PropertyStatus;
use App\Enums\Property\PropertyTargetProfile;
use App\Enums\Property\PropertyWaterSource;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PropertyFactory extends Factory
{
    public function definition(): array
    {
        $user = User::first() ?? User::factory()->create();

        return [
            'code' => Str::random(10),
            'name' => fake()->name(),
            'user_id' => $user->id,
            'availability_date' => fake()->date(),
            'visit_date' => fake()->date(),

            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'address' => fake()->address(),
            'area' => fake()->city(),

            'land_size' => fake()->numberBetween(1, 100),
            'building_size_sqm' => fake()->numberBetween(1, 100),
            'number_of_floors' => fake()->numberBetween(1, 100),
            'outdoor_area_size_sqm' => fake()->numberBetween(1, 100),
            'pool_size' => fake()->numberBetween(1, 100),

            'number_of_bathrooms' => fake()->numberBetween(1, 100),
            'ensuite_bathrooms' => fake()->boolean(),
            'guest_toilet' => fake()->boolean(),
            'storage' => fake()->boolean(),
            'living_style' => fake()->randomElement(PropertyLivingStyle::cases()),

            'full_legal_documentation' => fake()->boolean(),
            'fully_furnished' => fake()->boolean(),
            'rental_type' => fake()->randomElement(PropertyRentalType::cases()),
            'minimum_rental_duration_months' => fake()->numberBetween(1, 12),
            'owner_price_flexibility' => fake()->randomElement(PropertyPriceFlexibility::cases()),
            'price_coherent_with_upper' => fake()->boolean(),

            'not_directly_exposed_to_main_road' => fake()->boolean(),
            'no_festive_venue_nearby' => fake()->boolean(),
            'no_ongoing' => fake()->boolean(),
            'quiet_access_road' => fake()->boolean(),
            'orientation' => fake()->randomElement(PropertyOrientation::cases()),
            'view' => fake()->text(),

            'living_area_has_natural_light' => fake()->boolean(),
            'bedroom_1_has_natural_light' => fake()->boolean(),
            'bedroom_2_has_natural_light' => fake()->boolean(),
            'noise_source_identified' => fake()->text(),

            'internet_speedtest_mpbs' => fake()->numberBetween(1, 100),
            'power_backup' => fake()->randomElement(PropertyPowerBackup::cases()),
            'water_source' => fake()->randomElement(PropertyWaterSource::cases()),
            'electricity' => fake()->randomElement(PropertyElectricity::cases()),

            'eligible_for_upper' => fake()->boolean(),
            'eligible_for_premium' => fake()->boolean(),

            'design_driven_property' => fake()->boolean(),
            'usability_limitations' => fake()->text(),

            'trade_off_identified' => fake()->boolean(),
            'trade_off_description' => fake()->text(),
            'target_profile' => fake()->randomElement(PropertyTargetProfile::cases()),

            'operational_risk' => fake()->randomElement(PropertyOperationalRisk::cases()),
            'operational_risk_comment' => fake()->text(),

            'status' => fake()->randomElement(PropertyStatus::cases()),
        ];
    }
}
