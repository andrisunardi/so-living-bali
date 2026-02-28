<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.contact')
    ->name('index')
    ->middleware('permission:contact');

Route::livewire('/add', 'pages::cms.contact.add')
    ->name('add')
    ->middleware('permission:contact.add');

Route::livewire('/edit/{contact}', 'pages::cms.contact.edit')
    ->name('edit')
    ->middleware('permission:contact.edit');

Route::livewire('/detail/{contact}', 'pages::cms.contact.detail')
    ->name('detail')
    ->middleware('permission:contact.detail');
