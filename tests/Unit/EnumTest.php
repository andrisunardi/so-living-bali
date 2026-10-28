<?php

use App\Enums\Currency;
use App\Enums\Language;
use App\Enums\Property\PropertyBedroom;
use App\Enums\Property\PropertyCurrency;
use App\Enums\Property\PropertyElectricity;
use App\Enums\Property\PropertyLandContour;
use App\Enums\Property\PropertyLandTitle;
use App\Enums\Property\PropertyLeaseExtensionAvailable;
use App\Enums\Property\PropertyListingType;
use App\Enums\Property\PropertyLivingStyle;
use App\Enums\Property\PropertyOperationalRisk;
use App\Enums\Property\PropertyOrientation;
use App\Enums\Property\PropertyOwnerPriceFlexibility;
use App\Enums\Property\PropertyOwnershipType;
use App\Enums\Property\PropertyPBGStatus;
use App\Enums\Property\PropertyPowerBackup;
use App\Enums\Property\PropertyRentalType;
use App\Enums\Property\PropertyRoadAccess;
use App\Enums\Property\PropertySLFStatus;
use App\Enums\Property\PropertyStatus;
use App\Enums\Property\PropertyTab;
use App\Enums\Property\PropertyTargetProfile;
use App\Enums\Property\PropertyType;
use App\Enums\Property\PropertyWaterSource;

$enums = [
    Currency::class,
    Language::class,
    PropertyBedroom::class,
    PropertyCurrency::class,
    PropertyElectricity::class,
    PropertyLandContour::class,
    PropertyLandTitle::class,
    PropertyLeaseExtensionAvailable::class,
    PropertyListingType::class,
    PropertyLivingStyle::class,
    PropertyOperationalRisk::class,
    PropertyOrientation::class,
    PropertyOwnerPriceFlexibility::class,
    PropertyOwnershipType::class,
    PropertyPBGStatus::class,
    PropertyPowerBackup::class,
    PropertyRentalType::class,
    PropertyRoadAccess::class,
    PropertySLFStatus::class,
    PropertyStatus::class,
    PropertyTab::class,
    PropertyTargetProfile::class,
    PropertyType::class,
    PropertyWaterSource::class,
];

$publicInstanceMethods = function (string $enum): array {
    $methods = [];
    foreach ((new ReflectionEnum($enum))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
        if ($method->isStatic()) {
            continue;
        }
        if ($method->getNumberOfRequiredParameters() > 0) {
            continue;
        }
        if (in_array($method->getName(), ['cases', 'from', 'tryFrom'], true)) {
            continue;
        }
        if ($method->getDeclaringClass()->getName() !== $enum) {
            continue;
        }
        $methods[] = $method->getName();
    }

    return $methods;
};

it('resolves every method on every case without throwing', function (string $enum) use ($publicInstanceMethods) {
    $cases = $enum::cases();
    expect($cases)->not->toBeEmpty();

    foreach ($cases as $case) {
        foreach ($publicInstanceMethods($enum) as $method) {
            $value = $case->{$method}();
            expect($value)->not->toBeNull();

            if (is_string($value)) {
                expect($value)->not->toBe('');
            }
        }
    }
})->with($enums);

it('has a unique value per case', function (string $enum) {
    $values = array_map(fn ($case) => $case->value, $enum::cases());

    expect($values)->toBe(array_unique($values));
})->with($enums);
