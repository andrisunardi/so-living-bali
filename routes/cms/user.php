<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.user')
    ->name('index')
    ->middleware('permission:user');

Route::livewire('/add', 'pages::cms.user.add')
    ->name('add')
    ->middleware('permission:user.add');

Route::livewire('/edit/{user}', 'pages::cms.user.edit')
    ->name('edit')
    ->middleware('permission:user.edit');

Route::livewire('/detail/{user}', 'pages::cms.user.detail')
    ->name('detail')
    ->middleware('permission:user.detail');
