<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.permission')
    ->name('index')
    ->middleware('permission:permission');

Route::livewire('/add', 'pages::cms.permission.add')
    ->name('add')
    ->middleware('permission:permission.add');

Route::livewire('/edit/{permission}', 'pages::cms.permission.edit')
    ->name('edit')
    ->middleware('permission:permission.edit');

Route::livewire('/detail/{permission}', 'pages::cms.permission.detail')
    ->name('detail')
    ->middleware('permission:permission.detail');
