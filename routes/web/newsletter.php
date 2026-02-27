<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::newsletter')
    ->name('index')
    ->middleware('permission:customer.newsletter');

Route::livewire('/add', 'pages::newsletter.add')
    ->name('add')
    ->middleware('permission:customer.newsletter.add');

Route::livewire('/edit/{newsletter}', 'pages::newsletter.edit')
    ->name('edit')
    ->middleware('permission:customer.newsletter.edit');

Route::livewire('/detail/{newsletter}', 'pages::newsletter.detail')
    ->name('detail')
    ->middleware('permission:customer.newsletter.detail');
