<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::partnership')
    ->name('index')
    ->middleware('permission:customer.partnership');

Route::livewire('/add', 'pages::partnership.add')
    ->name('add')
    ->middleware('permission:customer.partnership.add');

Route::livewire('/edit/{partnership}', 'pages::partnership.edit')
    ->name('edit')
    ->middleware('permission:customer.partnership.edit');

Route::livewire('/detail/{partnership}', 'pages::partnership.detail')
    ->name('detail')
    ->middleware('permission:customer.partnership.detail');
