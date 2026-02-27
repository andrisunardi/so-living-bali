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

    // Route::prefix('cms')->name('cms.')->as('cms.')->group(base_path('routes/cms.php'));
});

Route::get('/oauth', [GoHighLevelController::class, 'oauth']);

// Route::livewire('/login', 'pages::login')->name('login');
// Route::livewire('/forgot-password', 'pages::forgot-password')->name('forgot-password');

// Route::group(['middleware' => ['auth']], function () {
//     Route::livewire('/', 'pages::home')->name('home');

//     // TRANSACTION
//     Route::prefix('product')
//         ->name('product.')
//         ->as('product.')
//         ->group(base_path('routes/web/product.php'));

//     // COMMUNICATION
//     Route::prefix('contact-subject')
//         ->name('contact-subject.')
//         ->as('contact-subject.')
//         ->group(base_path('routes/web/contact-subject.php'));

//     // SALES
//     Route::prefix('newsletter')
//         ->name('newsletter.')
//         ->as('newsletter.')
//         ->group(base_path('routes/web/newsletter.php'));

//     Route::prefix('hotel-inquiry')
//         ->name('hotel-inquiry.')
//         ->as('hotel-inquiry.')
//         ->group(base_path('routes/web/hotel-inquiry.php'));

//     Route::prefix('partnership')
//         ->name('partnership.')
//         ->as('partnership.')
//         ->group(base_path('routes/web/partnership.php'));

//     Route::prefix('partnership-image')
//         ->name('partnership-image.')
//         ->as('partnership-image.')
//         ->group(base_path('routes/web/partnership-image.php'));

//     Route::prefix('sales-outbound')
//         ->name('sales-outbound.')
//         ->as('sales-outbound.')
//         ->group(base_path('routes/web/sales-outbound.php'));

//     // MARKETING
//     Route::prefix('announcement')
//         ->name('announcement.')
//         ->as('announcement.')
//         ->group(base_path('routes/web/announcement.php'));

//     // MASTER
//     Route::prefix('outlet')
//         ->name('outlet.')
//         ->as('outlet.')
//         ->group(base_path('routes/web/outlet.php'));

//     Route::prefix('nationality')
//         ->name('nationality.')
//         ->as('nationality.')
//         ->group(base_path('routes/web/nationality.php'));

//     Route::prefix('continent')
//         ->name('continent.')
//         ->as('continent.')
//         ->group(base_path('routes/web/continent.php'));

//     // INTEGRATION
//     Route::prefix('sleekflow-log')
//         ->name('sleekflow-log.')
//         ->as('sleekflow-log.')
//         ->group(base_path('routes/web/sleekflow-log.php'));

//     // ACCESS
//     Route::prefix('permission')
//         ->name('permission.')
//         ->as('permission.')
//         ->group(base_path('routes/web/permission.php'));

//     Route::prefix('role')
//         ->name('role.')
//         ->as('role.')
//         ->group(base_path('routes/web/role.php'));

//     Route::prefix('user')
//         ->name('user.')
//         ->as('user.')
//         ->group(base_path('routes/web/user.php'));

//     Route::prefix('profile')
//         ->name('profile.')
//         ->as('profile.')
//         ->group(base_path('routes/web/profile.php'));

//     Route::livewire('/logout', 'pages::logout')->name('logout');
// });
