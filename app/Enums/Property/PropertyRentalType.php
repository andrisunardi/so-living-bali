<?php

namespace App\Enums\Property;

enum PropertyRentalType: int
{
    case Monthly = 1;

    case Yearly = 2;

    case Both = 3;

    public function description(): string
    {
        return match ($this) {
            self::Monthly => 'Monthly',
            self::Yearly => 'Yearly',
            self::Both => 'Both',
        };
    }

    public static function getDescription(int $value): string
    {
        return match ($value) {
            self::Monthly->value => 'Monthly',
            self::Yearly->value => 'Yearly',
            self::Both->value => 'Both',
        };
    }
}
