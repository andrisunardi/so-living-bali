<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.property-image')
    ->name('index')
    ->middleware('permission:property_image');

Route::livewire('/add', 'pages::cms.property-image.add')
    ->name('add')
    ->middleware('permission:property_image.add');

Route::livewire('/edit/{propertyImage}', 'pages::cms.property-image.edit')
    ->name('edit')
    ->middleware('permission:property_image.edit');

Route::livewire('/detail/{propertyImage}', 'pages::cms.property-image.detail')
    ->name('detail')
    ->middleware('permission:property_image.detail');
