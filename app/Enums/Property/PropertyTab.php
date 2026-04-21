<?php

namespace App\Enums\Property;

enum PropertyTab: int
{
    case PropertyIndentity = 1;

    case Location = 2;

    case SizeAndSurfaces = 3;

    case BathroomsAndLayout = 4;

    case LegalAndBasicEligibility = 5;

    case EnvironmentAndTranquility = 6;

    case LightAndAcoustics = 7;

    case UtilitiesAndTechnical = 8;

    case DesignLedOrInstagrammable = 9;

    case TradeOffAndTargetProfile = 10;

    public function description(): string
    {
        return match ($this) {
            self::PropertyIndentity => trans('property.property_identity'),
            self::Location => trans('property.location'),
            self::SizeAndSurfaces => trans('property.size_and_surfaces'),
            self::BathroomsAndLayout => trans('property.bathrooms_and_layout'),
            self::LegalAndBasicEligibility => trans('property.legal_and_basic_eligibility'),
            self::EnvironmentAndTranquility => trans('property.environment_and_tranquility'),
            self::LightAndAcoustics => trans('property.light_and_acoustics'),
            self::UtilitiesAndTechnical => trans('property.utilities_and_technical'),
            self::DesignLedOrInstagrammable => trans('property.design_led_or_instagrammable'),
            self::TradeOffAndTargetProfile => trans('property.trade_off_and_target_profile'),
        };
    }

    public static function getDescription(int $value): string
    {
        return match ($value) {
            self::PropertyIndentity->value => trans('property.property_identity'),
            self::Location->value => trans('property.location'),
            self::SizeAndSurfaces->value => trans('property.size_and_surfaces'),
            self::BathroomsAndLayout->value => trans('property.bathrooms_and_layout'),
            self::LegalAndBasicEligibility->value => trans('property.legal_and_basic_eligibility'),
            self::EnvironmentAndTranquility->value => trans('property.environment_and_tranquility'),
            self::LightAndAcoustics->value => trans('property.light_and_acoustics'),
            self::UtilitiesAndTechnical->value => trans('property.utilities_and_technical'),
            self::DesignLedOrInstagrammable->value => trans('property.design_led_or_instagrammable'),
            self::TradeOffAndTargetProfile->value => trans('property.trade_off_and_target_profile'),
        };
    }
}
