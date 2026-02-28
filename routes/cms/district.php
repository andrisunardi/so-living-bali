<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.district')
    ->name('index')
    ->middleware('permission:district');

Route::livewire('/add', 'pages::cms.district.add')
    ->name('add')
    ->middleware('permission:district.add');

Route::livewire('/edit/{district}', 'pages::cms.district.edit')
    ->name('edit')
    ->middleware('permission:district.edit');

Route::livewire('/detail/{district}', 'pages::cms.district.detail')
    ->name('detail')
    ->middleware('permission:district.detail');
