<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::nationality')
    ->name('index')
    ->middleware('permission:customer.nationality');

Route::livewire('/add', 'pages::nationality.add')
    ->name('add')
    ->middleware('permission:customer.nationality.add');

Route::livewire('/edit/{nationality}', 'pages::nationality.edit')
    ->name('edit')
    ->middleware('permission:customer.nationality.edit');

Route::livewire('/detail/{nationality}', 'pages::nationality.detail')
    ->name('detail')
    ->middleware('permission:customer.nationality.detail');
