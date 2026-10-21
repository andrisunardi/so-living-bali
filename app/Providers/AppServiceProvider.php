<?php

namespace App\Providers;

use App\Enums\Currency;
use App\Enums\Property\PropertyCurrency;
use App\Models\User;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if (app()->isLocal()) {
            app()->register(IdeHelperServiceProvider::class);
        }
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Model::shouldBeStrict();
        Model::preventLazyLoading();

        if (app()->isProduction()) {
            URL::forceScheme('https');
        }

        LogViewer::auth(fn ($request) => optional($request->user())->hasRole('Admin') ?? false);

        Gate::before(function (User $user) {
            return $user->hasRole('Admin');
        });

        Gate::after(function (User $user) {
            return $user->hasRole('Admin');
        });

        Str::macro('thousand', function ($value) {
            return number_format($value, 0, ',', '.');
        });

        Str::macro('idr', function ($value) {
            return 'IDR. '.number_format($value, 0, ',', '.');
        });

        Str::macro('currency', function (float $amount, ?PropertyCurrency $from = null): string {
            // Resolve the currency the price is stored in (defaults to IDR).
            $fromCurrency = match ($from) {
                PropertyCurrency::USD => Currency::USD,
                PropertyCurrency::EUR => Currency::EUR,
                default => Currency::IDR,
            };

            // Resolve the currency the visitor wants to see, falling back to IDR
            // if the session holds an unknown/stale value.
            $target = Currency::tryFrom(session('currency', Currency::IDR->value)) ?? Currency::IDR;

            // Cached rates are "how many <currency> per 1 IDR" (IDR is the base).
            // Normalise the stored amount to IDR first, then convert to the target.
            $fromRate = $fromCurrency === Currency::IDR
                ? 1.0
                : (float) Cache::get("currency-{$fromCurrency->value}", 0);
            $targetRate = $target === Currency::IDR
                ? 1.0
                : (float) Cache::get("currency-{$target->value}", 0);

            // If a required rate is missing, skip conversion rather than show a
            // wrong number: display the original amount in its own currency.
            if ($fromRate <= 0 || $targetRate <= 0) {
                $displayCurrency = $fromCurrency;
                $convertedAmount = $amount;
            } else {
                $displayCurrency = $target;
                $amountInIdr = $amount / $fromRate;
                $convertedAmount = $amountInIdr * $targetRate;
            }

            return match ($displayCurrency) {
                Currency::IDR => 'Rp '.number_format($convertedAmount, 0, ',', '.'),
                Currency::USD => '$'.number_format($convertedAmount, 2),
                Currency::AUD => 'A$'.number_format($convertedAmount, 2),
                Currency::EUR => '€'.number_format($convertedAmount, 2),
                Currency::GBP => '£'.number_format($convertedAmount, 2),
            };
        });

        Str::macro('abbreviate', function ($value) {
            $value = Str::replace('_', '', $value);
            $number = (int) $value;

            if ($number >= 1000) {
                $thousands = $number / 1000;
                $formatted = number_format($thousands, 0, ',', '.');

                return $formatted.'K';
            }

            return number_format($number, 0, ',', '.');
        });

        Str::macro('successDanger', function ($value) {
            return $value == 1 ? 'success' : 'danger';
        });

        Str::macro('yesNo', function ($value) {
            return $value ? trans('index.yes') : trans('index.no');
        });

        Str::macro('filesize', function ($bytes) {
            if (! $bytes) {
                return '-';
            }
            $units = ['B', 'KB', 'MB', 'GB'];
            $i = floor(log($bytes, 1024));

            return round($bytes / pow(1024, $i), 2).' '.$units[$i];
        });
    }
}
