<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::permission')
    ->name('index')
    ->middleware('permission:customer.permission');

Route::livewire('/add', 'pages::permission.add')
    ->name('add')
    ->middleware('permission:customer.permission.add');

Route::livewire('/edit/{permission}', 'pages::permission.edit')
    ->name('edit')
    ->middleware('permission:customer.permission.edit');

Route::livewire('/detail/{permission}', 'pages::permission.detail')
    ->name('detail')
    ->middleware('permission:customer.permission.detail');
