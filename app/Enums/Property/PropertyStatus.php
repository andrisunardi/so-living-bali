<?php

namespace App\Enums\Property;

enum PropertyStatus: int
{
    case Pending = 1;

    case AcceptUpper = 2;

    case AcceptPremium = 3;

    case Reject = 4;

    case Escalate = 5;

    public function description(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::AcceptUpper => 'AcceptUpper',
            self::AcceptPremium => 'AcceptPremium',
            self::Reject => 'Reject',
            self::Escalate => 'Escalate For Arbitration',
        };
    }

    public static function getDescription(int $value): string
    {
        return match ($value) {
            self::Pending->value => 'Pending',
            self::AcceptUpper->value => 'AcceptUpper',
            self::AcceptPremium->value => 'AcceptPremium',
            self::Reject->value => 'Reject',
            self::Escalate->value => 'Escalate For Arbitration',
        };
    }
}
