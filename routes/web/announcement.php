<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::announcement')
    ->name('index')
    ->middleware('permission:customer.announcement');

Route::livewire('/add', 'pages::announcement.add')
    ->name('add')
    ->middleware('permission:customer.announcement.add');

Route::livewire('/edit/{announcement}', 'pages::announcement.edit')
    ->name('edit')
    ->middleware('permission:customer.announcement.edit');

Route::livewire('/detail/{announcement}', 'pages::announcement.detail')
    ->name('detail')
    ->middleware('permission:customer.announcement.detail');
