<?php

namespace Tests\Unit;

use App\Enums\Property\PropertyCurrency;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Tests\TestCase;

/**
 * Tests for the Str::currency() macro registered in AppServiceProvider.
 *
 * Cached rates represent "how many <currency> per 1 IDR" (IDR is the base),
 * matching what ExchangeRateRefreshCurrency stores. The macro normalises the
 * stored amount to IDR first, then converts to the visitor's selected currency.
 */
class CurrencyMacroTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Known rates: 1 IDR = 0.000061 USD = 0.000057 EUR = 0.000065 GBP = 0.0000965 AUD.
        Cache::put('currency-usd', 0.000061);
        Cache::put('currency-eur', 0.000057);
        Cache::put('currency-gbp', 0.000065);
        Cache::put('currency-aud', 0.0000965);
    }

    public function test_idr_price_shown_in_idr_is_unchanged(): void
    {
        Session::put('currency', 'idr');

        $this->assertSame('Rp 1.000.000', Str::currency(1_000_000, PropertyCurrency::IDR));
    }

    public function test_idr_price_converted_to_usd(): void
    {
        Session::put('currency', 'usd');

        // 1,000,000 IDR * 0.000061 = 61.00 USD
        $this->assertSame('$61.00', Str::currency(1_000_000, PropertyCurrency::IDR));
    }

    public function test_eur_price_converted_to_usd(): void
    {
        Session::put('currency', 'usd');

        // 1000 EUR -> 1000 / 0.000057 = 17,543,859.65 IDR -> * 0.000061 = 1,070.18 USD
        $this->assertSame('$1,070.18', Str::currency(1000, PropertyCurrency::EUR));
    }

    public function test_usd_price_converted_to_eur(): void
    {
        Session::put('currency', 'eur');

        // 1000 USD -> 1000 / 0.000061 = 16,393,442.62 IDR -> * 0.000057 = 934.43 EUR
        $this->assertSame('€934.43', Str::currency(1000, PropertyCurrency::USD));
    }

    public function test_price_in_same_currency_as_target_is_unchanged(): void
    {
        Session::put('currency', 'usd');

        // Converting USD -> USD must round-trip to the original amount.
        $this->assertSame('$1,000.00', Str::currency(1000, PropertyCurrency::USD));
    }

    public function test_defaults_to_idr_when_no_currency_selected(): void
    {
        Session::forget('currency');

        $this->assertSame('Rp 500.000', Str::currency(500_000, PropertyCurrency::IDR));
    }

    public function test_defaults_source_currency_to_idr_when_not_provided(): void
    {
        Session::put('currency', 'usd');

        // No PropertyCurrency passed -> treated as IDR. 1,000,000 * 0.000061 = 61.00 USD
        $this->assertSame('$61.00', Str::currency(1_000_000));
    }

    public function test_unknown_selected_currency_falls_back_to_idr_without_error(): void
    {
        // A stale/invalid session value must not trigger an UnhandledMatchError.
        Session::put('currency', 'xyz');

        $this->assertSame('Rp 1.000.000', Str::currency(1_000_000, PropertyCurrency::IDR));
    }

    public function test_missing_target_rate_shows_original_amount_in_its_own_currency(): void
    {
        // Rate not cached for the selected currency -> no bogus number, show source currency.
        Cache::forget('currency-eur');
        Session::put('currency', 'eur');

        // Source is USD, so display stays in USD with the original amount.
        $this->assertSame('$1,000.00', Str::currency(1000, PropertyCurrency::USD));
    }

    public function test_missing_source_rate_shows_original_amount_in_its_own_currency(): void
    {
        Cache::forget('currency-eur');
        Session::put('currency', 'usd');

        // Source EUR rate missing -> cannot normalise to IDR -> show original EUR amount.
        $this->assertSame('€1,000.00', Str::currency(1000, PropertyCurrency::EUR));
    }
}
