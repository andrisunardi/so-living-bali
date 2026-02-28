<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.area')
    ->name('index')
    ->middleware('permission:area');

Route::livewire('/add', 'pages::cms.area.add')
    ->name('add')
    ->middleware('permission:area.add');

Route::livewire('/edit/{area}', 'pages::cms.area.edit')
    ->name('edit')
    ->middleware('permission:area.edit');

Route::livewire('/detail/{area}', 'pages::cms.area.detail')
    ->name('detail')
    ->middleware('permission:area.detail');
