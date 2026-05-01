<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::guide')
    ->name('index')
    ->middleware('permission:guide');

Route::livewire('/add', 'pages::guide.add')
    ->name('add')
    ->middleware('permission:guide.add');

Route::livewire('/edit/{guide}', 'pages::guide.edit')
    ->name('edit')
    ->middleware('permission:guide.edit');

Route::livewire('/detail/{guide}', 'pages::guide.detail')
    ->name('detail')
    ->middleware('permission:guide.detail');
