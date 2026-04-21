<?php

namespace App\Enums;

enum Currency: string
{
    case USD = 'usd';

    case AUD = 'aud';

    case EUR = 'eur';

    case IDR = 'idr';

    case GBP = 'gbp';

    case CNY = 'cny';

    case YEN = 'yen';

    public function icon(): string
    {
        return match ($this) {
            self::USD => 'fas fa-dollar-sign',
            self::AUD => 'fas fa-dollar-sign',
            self::EUR => 'fas fa-euro-sign',
            self::IDR => 'fas fa-rupiah-sign',
            self::GBP => 'fas fa-sterling-sign',
            self::CNY => 'fas fa-yen-sign',
            self::YEN => 'fas fa-yen-sign',
        };
    }

    public static function getIcon(int $value): string
    {
        return match ($value) {
            self::USD->value => 'fas fa-dollar-sign',
            self::AUD->value => 'fas fa-dollar-sign',
            self::EUR->value => 'fas fa-euro-sign',
            self::IDR->value => 'fas fa-rupiah-sign',
            self::GBP->value => 'fas fa-sterling-sign',
            self::CNY->value => 'fas fa-yen-sign',
            self::YEN->value => 'fas fa-yen-sign',
        };
    }
}
