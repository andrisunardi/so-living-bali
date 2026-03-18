<?php

use App\Http\Controllers\GoHighLevelController;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::any('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setlocale($locale);

    return redirect()->back();
})->name('locale');

Route::group(['middleware' => [Localization::class]], function () {
    Route::livewire('/', 'pages::home')->name('home');

    Route::livewire('/about', 'pages::about')->name('about');
    Route::livewire('/service', 'pages::service')->name('service');
    Route::livewire('/article', 'pages::article')->name('article');
    Route::livewire('/contact', 'pages::contact')->name('contact');

    Route::prefix('cms')->name('cms.')->as('cms.')->group(base_path('routes/cms.php'));
});

Route::get('/oauth', [GoHighLevelController::class, 'oauth']);
