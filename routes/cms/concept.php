<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.concept')
    ->name('index')
    ->middleware('permission:concept');

Route::livewire('/add', 'pages::cms.concept.add')
    ->name('add')
    ->middleware('permission:concept.add');

Route::livewire('/edit/{concept}', 'pages::cms.concept.edit')
    ->name('edit')
    ->middleware('permission:concept.edit');

Route::livewire('/detail/{concept}', 'pages::cms.concept.detail')
    ->name('detail')
    ->middleware('permission:concept.detail');
