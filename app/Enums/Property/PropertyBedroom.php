<?php

namespace App\Enums\Property;

enum PropertyBedroom: int
{
    case OneBedroom = 1;

    case TwoBedroom = 2;

    case ThreeBedroom = 3;

    case FourBedroom = 4;

    public function description(): string
    {
        return match ($this) {
            self::OneBedroom => '1 Bedroom',
            self::TwoBedroom => '2 Bedroom',
            self::ThreeBedroom => '3 Bedroom',
            self::FourBedroom => '4 Bedroom',
        };
    }

    public static function getDescription(int $value): string
    {
        return match ($value) {
            self::OneBedroom->value => '1 Bedroom',
            self::TwoBedroom->value => '2 Bedroom',
            self::ThreeBedroom->value => '3 Bedroom',
            self::FourBedroom->value => '4 Bedroom',
        };
    }
}
