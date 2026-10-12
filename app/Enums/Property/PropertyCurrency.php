<?php

namespace App\Enums\Property;

enum PropertyCurrency: int
{
    case IDR = 1;

    case USD = 2;

    case EUR = 3;

    public function icon(): string
    {
        return match ($this) {
            self::IDR => 'fas fa-rupiah-sign',
            self::USD => 'fas fa-dollar-sign',
            self::EUR => 'fas fa-euro-sign',
        };
    }
}
