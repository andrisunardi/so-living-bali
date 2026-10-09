<?php

namespace App\Enums\Property;

use Illuminate\Support\Str;

enum PropertyType: int
{
    case Villa = 1;

    case Apartment = 2;

    case Land = 3;

    case Commercial = 4;

    case Hotel = 5;

    case VillaComplex = 6;

    case Other = 7;

    public function description(): string
    {
        return __('property.'.Str::snake($this->name));
    }
}
