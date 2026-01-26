<?php

use App\Http\Controllers\GoHighLevelController;
use App\Http\Middleware\Localization;
use App\Livewire\Home\HomePage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::any('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setlocale($locale);

    return redirect()->back();
})->name('locale');

Route::group(['middleware' => [
    Localization::class,
]], function () {
    Route::any('', HomePage::class)->name('home');
    Route::any('about', HomePage::class)->name('about');
    Route::any('service', HomePage::class)->name('service');
    Route::any('article', HomePage::class)->name('article');
    Route::any('contact', HomePage::class)->name('contact');

    Route::prefix('cms')->name('cms.')->as('cms.')->group(base_path('routes/cms.php'));
});

Route::get('oauth', [GoHighLevelController::class, 'oauth']);
