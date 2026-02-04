<?php

namespace App\Enums\Property;

enum PropertyPriceFlexibility: int
{
    case Fixed = 1;

    case Negotiable = 2;

    public function description(): string
    {
        return match ($this) {
            self::Fixed => 'Fixed',
            self::Negotiable => 'Negotiable',
        };
    }

    public static function getDescription(int $value): string
    {
        return match ($value) {
            self::Fixed->value => 'Fixed',
            self::Negotiable->value => 'Negotiable',
        };
    }
}
