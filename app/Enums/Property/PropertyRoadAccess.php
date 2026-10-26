<?php

namespace App\Enums\Property;

enum PropertyRoadAccess: int
{
    case Public = 1;

    case Private = 2;

    case Shared = 3;

    public function description(): string
    {
        return match ($this) {
            self::Public => 'Public',
            self::Private => 'Private',
            self::Shared => 'Shared',
        };
    }
}
