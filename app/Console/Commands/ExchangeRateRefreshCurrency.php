<?php

namespace App\Console\Commands;

use App\Enums\Currency;
use App\Libraries\ExchangeRate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ExchangeRateRefreshCurrency extends Command
{
    protected $signature = 'exchange-rate:refresh-currency';

    protected $description = 'Exchange Rate Refresh Currency';

    public function handle(): bool
    {
        $currencies = collect(Currency::cases())->reject(fn ($q) => $q == Currency::IDR);

        // Rates are fetched with IDR as the base, so each value represents
        // "how many <currency> per 1 IDR".
        $exchangeRate = (new ExchangeRate)->index(currency: Currency::IDR->value);
        $conversionRates = $exchangeRate['conversion_rates'] ?? null;

        if (! is_array($conversionRates)) {
            $this->error('Currency refresh failed: no conversion rates returned from the exchange rate API. Check EXCHANGE_RATE_URL / EXCHANGE_RATE_TOKEN.');
            Log::error('Currency refresh failed: no conversion rates returned.', ['response' => $exchangeRate]);

            return Command::FAILURE;
        }

        foreach ($currencies as $currency) {
            $rate = $conversionRates[strtoupper($currency->value)] ?? null;

            if (! is_numeric($rate) || $rate <= 0) {
                $this->warn("Skipping {$currency->value}: missing or invalid rate.");
                Log::warning('Skipping currency with missing/invalid rate.', ['currency' => $currency->value]);

                continue;
            }

            Cache::forever("currency-{$currency->value}", (float) $rate);
        }

        $this->info('Currency is Refreshed.');
        Log::info('Currency is Refreshed.');

        return Command::SUCCESS;
    }
}
