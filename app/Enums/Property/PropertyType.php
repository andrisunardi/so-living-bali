<?php

namespace App\Enums\Property;

enum PropertyType: int
{
    case Villa = 1;

    case Apartment = 2;

    public function description(): string
    {
        return match ($this) {
            self::Villa => 'Villa',
            self::Apartment => 'Apartment',
        };
    }

    public static function getDescription(int $value): string
    {
        return match ($value) {
            self::Villa->value => 'Villa',
            self::Apartment->value => 'Apartment',
        };
    }
}
