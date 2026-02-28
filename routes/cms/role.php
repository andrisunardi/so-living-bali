<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.role')
    ->name('index')
    ->middleware('permission:role');

Route::livewire('/add', 'pages::cms.role.add')
    ->name('add')
    ->middleware('permission:role.add');

Route::livewire('/edit/{role}', 'pages::cms.role.edit')
    ->name('edit')
    ->middleware('permission:role.edit');

Route::livewire('/detail/{role}', 'pages::cms.role.detail')
    ->name('detail')
    ->middleware('permission:role.detail');
