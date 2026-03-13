<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/login', 'pages::cms.login')->name('login');
Route::livewire('/forgot-password', 'pages::cms.forgot-password')->name('forgot-password');

Route::group(['middleware' => ['auth']], function () {
    Route::livewire('/', 'pages::cms.home')->name('home');

    // MODULE
    Route::prefix('contact')
        ->name('contact.')
        ->as('contact.')
        ->middleware(['permission:contact'])
        ->group(base_path('routes/cms/contact.php'));

    // ARTICLE
    Route::prefix('article')
        ->name('article.')
        ->as('article.')
        ->middleware(['permission:article'])
        ->group(base_path('routes/cms/article.php'));

    // PROPERTY
    Route::prefix('property')
        ->name('property.')
        ->as('property.')
        ->middleware(['permission:property'])
        ->group(base_path('routes/cms/property.php'));

    // PROPERTY IMAGE
    Route::prefix('property-image')
        ->name('property-image.')
        ->as('property-image.')
        ->middleware(['permission:property_image'])
        ->group(base_path('routes/cms/property-image.php'));

    // MASTER
    Route::prefix('area')
        ->name('area.')
        ->as('area.')
        ->middleware(['permission:area'])
        ->group(base_path('routes/cms/area.php'));

    Route::prefix('district')
        ->name('district.')
        ->as('district.')
        ->middleware(['permission:district'])
        ->group(base_path('routes/cms/district.php'));

    // ACCESS
    Route::prefix('permission')
        ->name('permission.')
        ->as('permission.')
        ->middleware(['permission:permission'])
        ->group(base_path('routes/cms/permission.php'));

    Route::prefix('role')
        ->name('role.')
        ->as('role.')
        ->middleware(['permission:role'])
        ->group(base_path('routes/cms/role.php'));

    Route::prefix('user')
        ->name('user.')
        ->as('user.')
        ->middleware(['permission:user'])
        ->group(base_path('routes/cms/user.php'));

    Route::prefix('profile')
        ->name('profile.')
        ->as('profile.')
        ->group(base_path('routes/cms/profile.php'));

    Route::livewire('/logout', 'pages::cms.logout')->name('logout');
});
