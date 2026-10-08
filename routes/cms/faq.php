<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.faq')
    ->name('index')
    ->middleware('permission:faq');

Route::livewire('/add', 'pages::cms.faq.add')
    ->name('add')
    ->middleware('permission:faq.add');

Route::livewire('/edit/{faq}', 'pages::cms.faq.edit')
    ->name('edit')
    ->middleware('permission:faq.edit');

Route::livewire('/detail/{faq}', 'pages::cms.faq.detail')
    ->name('detail')
    ->middleware('permission:faq.detail');
