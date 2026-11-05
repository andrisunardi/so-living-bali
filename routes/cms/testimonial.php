<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.testimonial')
    ->name('index')
    ->middleware('permission:testimonial');

Route::livewire('/add', 'pages::cms.testimonial.add')
    ->name('add')
    ->middleware('permission:testimonial.add');

Route::livewire('/edit/{testimonial}', 'pages::cms.testimonial.edit')
    ->name('edit')
    ->middleware('permission:testimonial.edit');

Route::livewire('/detail/{testimonial}', 'pages::cms.testimonial.detail')
    ->name('detail')
    ->middleware('permission:testimonial.detail');
