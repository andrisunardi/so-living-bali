<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.property')
    ->name('index')
    ->middleware('permission:property');

Route::livewire('/add', 'pages::cms.property.add')
    ->name('add')
    ->middleware('permission:property.add');

Route::livewire('/edit/{property}', 'pages::cms.property.edit')
    ->name('edit')
    ->middleware('permission:property.edit');

Route::livewire('/detail/{property}', 'pages::cms.property.detail')
    ->name('detail')
    ->middleware('permission:property.detail');
