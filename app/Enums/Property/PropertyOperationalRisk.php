<?php

namespace App\Enums\Property;

enum PropertyOperationalRisk: int
{
    case Low = 1;

    case Medium = 2;

    case High = 3;

    public function description(): string
    {
        return match ($this) {
            self::Low => 'Low',
            self::Medium => 'Medium',
            self::High => 'High',
        };
    }

    public static function getDescription(int $value): string
    {
        return match ($value) {
            self::Low->value => 'Low',
            self::Medium->value => 'Medium',
            self::High->value => 'High',
        };
    }
}
