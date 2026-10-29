<?php

namespace Tests\Feature;

use App\Enums\Property\PropertyListingType;
use App\Enums\Property\PropertyRentalType;
use App\Enums\Property\PropertyStatus;
use App\Models\Property;
use App\Services\PropertyService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class PropertyPriceFilterTest extends TestCase
{
    use RefreshDatabase;

    private function createRental(int $monthlyPrice, ?int $rentalType = null): Property
    {
        return Property::create([
            'code' => Str::upper(Str::random(8)),
            'name' => 'Villa '.Str::random(6),
            'description' => 'x',
            'description_id' => 'x',
            'description_fr' => 'x',
            'status' => PropertyStatus::AcceptUpper,
            'listing_type' => PropertyListingType::ForRent,
            'rental_type' => $rentalType ?? PropertyRentalType::Monthly->value,
            'monthly_price' => $monthlyPrice,
        ]);
    }

    public function test_monthly_price_range_excludes_properties_above_max(): void
    {
        $inRange = $this->createRental(100_000_000);
        $aboveRange = $this->createRental(186_000_000);

        $service = new PropertyService;
        $results = $service->index(
            rentalTypes: [PropertyRentalType::Monthly->value, PropertyRentalType::Both->value],
            prices: ['min' => 40_000_000, 'max' => 134_000_000],
            statuses: [PropertyStatus::AcceptUpper->value, PropertyStatus::AcceptPremium->value],
            paginate: false,
        );

        $ids = $results->pluck('id');

        $this->assertTrue($ids->contains($inRange->id));
        $this->assertFalse($ids->contains($aboveRange->id));
    }

    public function test_monthly_price_range_excludes_properties_below_min(): void
    {
        $below = $this->createRental(20_000_000);
        $inRange = $this->createRental(80_000_000);

        $service = new PropertyService;
        $results = $service->index(
            rentalTypes: [PropertyRentalType::Monthly->value, PropertyRentalType::Both->value],
            prices: ['min' => 40_000_000, 'max' => 134_000_000],
            statuses: [PropertyStatus::AcceptUpper->value, PropertyStatus::AcceptPremium->value],
            paginate: false,
        );

        $ids = $results->pluck('id');

        $this->assertTrue($ids->contains($inRange->id));
        $this->assertFalse($ids->contains($below->id));
    }

    public function test_both_rental_type_property_is_filtered_by_monthly_price(): void
    {
        $both = $this->createRental(90_000_000, PropertyRentalType::Both->value);
        $bothAbove = $this->createRental(200_000_000, PropertyRentalType::Both->value);

        $service = new PropertyService;
        $results = $service->index(
            rentalTypes: [PropertyRentalType::Monthly->value, PropertyRentalType::Both->value],
            prices: ['min' => 40_000_000, 'max' => 134_000_000],
            statuses: [PropertyStatus::AcceptUpper->value, PropertyStatus::AcceptPremium->value],
            paginate: false,
        );

        $ids = $results->pluck('id');

        $this->assertTrue($ids->contains($both->id));
        $this->assertFalse($ids->contains($bothAbove->id));
    }
}
