<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.guide-category')
    ->name('index')
    ->middleware('permission:guide_category');

Route::livewire('/add', 'pages::cms.guide-category.add')
    ->name('add')
    ->middleware('permission:guide_category.add');

Route::livewire('/edit/{guideCategory}', 'pages::cms.guide-category.edit')
    ->name('edit')
    ->middleware('permission:guide_category.edit');

Route::livewire('/detail/{guideCategory}', 'pages::cms.guide-category.detail')
    ->name('detail')
    ->middleware('permission:guide_category.detail');
