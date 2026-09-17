<?php

namespace App\Enums\Property;

enum PropertyLivingStyle: int
{
    case Open = 1;

    case Enclosed = 2;

    case Mixed = 3;

    public function translate(): string
    {
        return match ($this) {
            self::Open => trans('property.living_style_open'),
            self::Enclosed => trans('property.living_style_enclosed'),
            self::Mixed => trans('property.living_style_mixed'),
        };
    }
}
