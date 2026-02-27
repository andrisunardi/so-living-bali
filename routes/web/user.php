<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::user')
    ->name('index')
    ->middleware('permission:customer.user');

Route::livewire('/add', 'pages::user.add')
    ->name('add')
    ->middleware('permission:customer.user.add');

Route::livewire('/edit/{user}', 'pages::user.edit')
    ->name('edit')
    ->middleware('permission:customer.user.edit');

Route::livewire('/detail/{user}', 'pages::user.detail')
    ->name('detail')
    ->middleware('permission:customer.user.detail');
