<?php

namespace App\Enums\Property;

enum PropertyPowerBackup: int
{
    case Generator = 1;

    case Solar = 2;

    case None = 3;

    public function description(): string
    {
        return match ($this) {
            self::Generator => 'Generator',
            self::Solar => 'Solar',
            self::None => 'None',
        };
    }

    public static function getDescription(int $value): string
    {
        return match ($value) {
            self::Generator->value => 'Generator',
            self::Solar->value => 'Solar',
            self::None->value => 'None',
        };
    }
}
