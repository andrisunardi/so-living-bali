<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::outlet')
    ->name('index')
    ->middleware('permission:customer.outlet');

Route::livewire('/add', 'pages::outlet.add')
    ->name('add')
    ->middleware('permission:customer.outlet.add');

Route::livewire('/edit/{outlet}', 'pages::outlet.edit')
    ->name('edit')
    ->middleware('permission:customer.outlet.edit');

Route::livewire('/detail/{outlet}', 'pages::outlet.detail')
    ->name('detail')
    ->middleware('permission:customer.outlet.detail');
