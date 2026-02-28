<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::article')
    ->name('index')
    ->middleware('permission:article');

Route::livewire('/add', 'pages::article.add')
    ->name('add')
    ->middleware('permission:article.add');

Route::livewire('/edit/{article}', 'pages::article.edit')
    ->name('edit')
    ->middleware('permission:article.edit');

Route::livewire('/detail/{article}', 'pages::article.detail')
    ->name('detail')
    ->middleware('permission:article.detail');
