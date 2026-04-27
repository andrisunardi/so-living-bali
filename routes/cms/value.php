<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.value')
    ->name('index')
    ->middleware('permission:value');

Route::livewire('/add', 'pages::cms.value.add')
    ->name('add')
    ->middleware('permission:value.add');

Route::livewire('/edit/{value}', 'pages::cms.value.edit')
    ->name('edit')
    ->middleware('permission:value.edit');

Route::livewire('/detail/{value}', 'pages::cms.value.detail')
    ->name('detail')
    ->middleware('permission:value.detail');
