<?php

use App\Enums\Currency;
use App\Enums\Language;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::any('locale/{locale}', function ($locale) {
    $target = Language::tryFrom($locale)?->value ?? config('app.locale');

    $previous = url()->previous();
    $path = trim(parse_url($previous, PHP_URL_PATH) ?? '/', '/');

    $segments = array_values(array_filter(explode('/', $path)));

    if (isset($segments[0]) && Language::tryFrom($segments[0])) {
        array_shift($segments);
    }

    $basePath = implode('/', $segments);

    $prefix = $target === config('app.locale') ? '' : $target;
    $newPath = trim($prefix.'/'.$basePath, '/');

    $query = parse_url($previous, PHP_URL_QUERY);

    return redirect(url($newPath).($query ? '?'.$query : ''));
})->name('locale');

Route::any('currency/{currency}', function ($currency) {
    // Only persist known currencies so a stale/invalid value can't break price rendering.
    if (Currency::tryFrom($currency) !== null) {
        Session::put('currency', $currency);
    }

    return redirect()->back();
})->name('currency');

$publicRoutes = function () {
    Route::livewire('/', 'pages::home')->name('home');

    Route::livewire('/about', 'pages::about')->name('about');
    Route::livewire('/service', 'pages::service')->name('service');

    Route::livewire('/guide', 'pages::guide')->name('guide.index');
    Route::livewire('/guide/{slug}', 'pages::guide.detail')->name('guide.detail');

    Route::livewire('/property', 'pages::property.index')->name('property.index');
    Route::livewire('/properties-for-sale', 'pages::property.properties-for-sale')->name('property.properties-for-sale');
    Route::livewire('/property/{slug}', 'pages::property.detail')->name('property.detail');
    Route::livewire('/property-for-sale/{area}/{slug}', 'pages::property.sale-detail')->name('property.sale.detail');

    Route::redirect('/properties-for-sale/{slug}', '/property-for-sale/bali/{slug}', 301);

    Route::livewire('/contact', 'pages::contact')->name('contact');
};

Route::middleware([Localization::class])->group(function () use ($publicRoutes) {
    Route::prefix('{locale?}')
        ->where(['locale' => '(id|fr)?'])
        ->group($publicRoutes);

    $publicRoutes();
});

Route::prefix('cms')->name('cms.')->as('cms.')->group(base_path('routes/cms.php'));

Route::prefix('leadconnector')
    ->name('leadconnector.')
    ->as('leadconnector.')
    ->group(base_path('routes/leadconnector.php'));

Route::prefix('google')
    ->name('google.')
    ->as('google.')
    ->group(base_path('routes/google.php'));
