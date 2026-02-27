<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::role')
    ->name('index')
    ->middleware('permission:customer.role');

Route::livewire('/add', 'pages::role.add')
    ->name('add')
    ->middleware('permission:customer.role.add');

Route::livewire('/edit/{role}', 'pages::role.edit')
    ->name('edit')
    ->middleware('permission:customer.role.edit');

Route::livewire('/detail/{role}', 'pages::role.detail')
    ->name('detail')
    ->middleware('permission:customer.role.detail');
