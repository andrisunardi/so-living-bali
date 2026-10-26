<?php

namespace App\Enums\Property;

enum PropertyLeaseExtensionAvailable: int
{
    case Yes = 1;

    case No = 2;

    case ToBeConfirmed = 3;

    public function description(): string
    {
        return match ($this) {
            self::Yes => 'Yes',
            self::No => 'No',
            self::ToBeConfirmed => 'To Be Confirmed',
        };
    }
}
