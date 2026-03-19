<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.oauth')
    ->name('index')
    ->middleware('permission:oauth');

Route::livewire('/add', 'pages::cms.oauth.add')
    ->name('add')
    ->middleware('permission:oauth.add');

Route::livewire('/edit/{oauth}', 'pages::cms.oauth.edit')
    ->name('edit')
    ->middleware('permission:oauth.edit');

Route::livewire('/detail/{oauth}', 'pages::cms.oauth.detail')
    ->name('detail')
    ->middleware('permission:oauth.detail');
