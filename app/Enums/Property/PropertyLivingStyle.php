<?php

namespace App\Enums\Property;

enum PropertyLivingStyle: int
{
    case Open = 1;

    case Closed = 2;

    case Mixed = 3;

    public function description(): string
    {
        return match ($this) {
            self::Open => 'Open',
            self::Closed => 'Closed',
            self::Mixed => 'Mixed',
        };
    }

    public static function getDescription(int $value): string
    {
        return match ($value) {
            self::Open->value => 'Open',
            self::Closed->value => 'Closed',
            self::Mixed->value => 'Mixed',
        };
    }
}
