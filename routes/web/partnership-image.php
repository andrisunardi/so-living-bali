<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::partnership-image')
    ->name('index')
    ->middleware('permission:customer.partnership_image');

Route::livewire('/add', 'pages::partnership-image.add')
    ->name('add')
    ->middleware('permission:customer.partnership_image.add');

Route::livewire('/edit/{partnershipImage}', 'pages::partnership-image.edit')
    ->name('edit')
    ->middleware('permission:customer.partnership_image.edit');

Route::livewire('/detail/{partnershipImage}', 'pages::partnership-image.detail')
    ->name('detail')
    ->middleware('permission:customer.partnership_image.detail');
