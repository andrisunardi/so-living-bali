<?php

namespace App\Console\Commands;

use App\Enums\Property\PropertyListingType;
use App\Enums\Property\PropertyStatus;
use App\Models\Property;
use App\Services\PropertyService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class RefreshNearbyPlaces extends Command
{
    protected $signature = 'nearby:refresh';

    protected $description = 'Warm the nearby places cache for published for-sale properties';

    public function handle(PropertyService $service): int
    {
        $properties = Property::query()
            ->whereIn('status', [PropertyStatus::AcceptUpper->value, PropertyStatus::AcceptPremium->value])
            ->whereIn('listing_type', [PropertyListingType::ForSale->value, PropertyListingType::ForRentAndSale->value])
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get();

        foreach ($properties as $property) {
            Cache::forget('nearby-'.round((float) $property->latitude, 4).'-'.round((float) $property->longitude, 4).'-3000-8');

            $places = $service->nearby($property);

            $this->line($property->code.': '.count($places).' places');
        }

        $this->info('Nearby places refreshed.');

        return Command::SUCCESS;
    }
}
