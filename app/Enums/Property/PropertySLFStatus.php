<?php

namespace App\Enums\Property;

enum PropertySLFStatus: int
{
    case Available = 1;

    case InProccess = 2;

    case NotAvailable = 3;

    case NotApplicable = 4;

    public function description(): string
    {
        return match ($this) {
            self::Available => 'Available',
            self::InProccess => 'In Process',
            self::NotAvailable => 'Not Available',
            self::NotApplicable => 'Not Applicable',
        };
    }
}
