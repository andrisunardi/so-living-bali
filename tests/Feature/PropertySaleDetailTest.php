<?php

namespace Tests\Feature;

use App\Enums\Property\PropertyCurrency;
use App\Enums\Property\PropertyListingType;
use App\Enums\Property\PropertyStatus;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class PropertySaleDetailTest extends TestCase
{
    use RefreshDatabase;

    private function createProperty(array $attributes = []): Property
    {
        $code = Str::upper(Str::random(8));
        $name = 'Villa '.Str::random(6);

        return Property::create(array_merge([
            'code' => $code,
            'name' => $name,
            'description' => 'A beautiful villa for sale.',
            'description_id' => 'x',
            'description_fr' => 'x',
            'status' => PropertyStatus::AcceptUpper,
            'listing_type' => PropertyListingType::ForSale,
            'sale_price' => 1_000_000_000,
            'currency' => PropertyCurrency::IDR,
        ], $attributes));
    }

    public function test_for_sale_detail_returns_200_for_published_sale_slug(): void
    {
        $property = $this->createProperty([
            'status' => PropertyStatus::AcceptUpper,
            'listing_type' => PropertyListingType::ForSale,
        ]);

        $response = $this->get(route('property.sale.detail', ['area' => 'bali', 'slug' => $property->slug]));

        $response->assertStatus(200);
        $response->assertSee($property->name);
    }

    public function test_for_sale_detail_returns_200_for_second_allowed_status_and_listing_type(): void
    {
        $property = $this->createProperty([
            'status' => PropertyStatus::AcceptPremium,
            'listing_type' => PropertyListingType::ForRentAndSale,
        ]);

        $response = $this->get(route('property.sale.detail', ['area' => 'bali', 'slug' => $property->slug]));

        $response->assertStatus(200);
        $response->assertSee($property->name);
    }

    public function test_for_sale_detail_renders_new_sale_detail_fields_when_present(): void
    {
        $property = $this->createProperty([
            'status' => PropertyStatus::AcceptUpper,
            'listing_type' => PropertyListingType::ForSale,
            'latitude' => -8.65,
            'longitude' => 115.13,
            'highlights' => [
                'Ocean view rooftop',
            ],
            'video_tour' => 'https://example.com/video-tour',
            'floor_plan' => 'https://example.com/floor-plan.pdf',
        ]);

        $response = $this->get(route('property.sale.detail', ['area' => 'bali', 'slug' => $property->slug]));

        $response->assertStatus(200);
        $response->assertSee('Ocean view rooftop');
        $response->assertSee('Why This Property Stands Out');
        $response->assertSee('https://example.com/video-tour', false);
        $response->assertSee('https://example.com/floor-plan.pdf', false);
        $response->assertSee('sale-map');
    }

    public function test_for_sale_detail_hides_new_sale_detail_fields_when_empty(): void
    {
        $property = $this->createProperty([
            'status' => PropertyStatus::AcceptUpper,
            'listing_type' => PropertyListingType::ForSale,
            'latitude' => null,
            'longitude' => null,
            'highlights' => null,
            'video_tour' => null,
            'floor_plan' => null,
        ]);

        $response = $this->get(route('property.sale.detail', ['area' => 'bali', 'slug' => $property->slug]));

        $response->assertStatus(200);
        $response->assertDontSee('Why This Property Stands Out');
        $response->assertDontSee(trans('property.video_tour'));
        $response->assertDontSee(trans('property.floor_plan'));
        $response->assertDontSee('sale-map');
    }

    public function test_for_sale_detail_returns_404_for_unknown_slug(): void
    {
        $response = $this->get(route('property.sale.detail', ['area' => 'bali', 'slug' => 'non-existent-slug']));

        $response->assertStatus(404);
    }

    public function test_for_sale_detail_returns_404_for_non_sale_listing(): void
    {
        $property = $this->createProperty([
            'status' => PropertyStatus::AcceptUpper,
            'listing_type' => PropertyListingType::ForRent,
        ]);

        $response = $this->get(route('property.sale.detail', ['area' => 'bali', 'slug' => $property->slug]));

        $response->assertStatus(404);
    }

    public function test_for_sale_detail_returns_404_for_unpublished_sale(): void
    {
        $property = $this->createProperty([
            'status' => PropertyStatus::Pending,
            'listing_type' => PropertyListingType::ForSale,
        ]);

        $response = $this->get(route('property.sale.detail', ['area' => 'bali', 'slug' => $property->slug]));

        $response->assertStatus(404);
    }
}
