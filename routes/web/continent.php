<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::continent')
    ->name('index')
    ->middleware('permission:customer.continent');

Route::livewire('/add', 'pages::continent.add')
    ->name('add')
    ->middleware('permission:customer.continent.add');

Route::livewire('/edit/{continent}', 'pages::continent.edit')
    ->name('edit')
    ->middleware('permission:customer.continent.edit');

Route::livewire('/detail/{continent}', 'pages::continent.detail')
    ->name('detail')
    ->middleware('permission:customer.continent.detail');
