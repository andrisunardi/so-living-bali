<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::product')
    ->name('index')
    ->middleware('permission:customer.product');

Route::livewire('/add', 'pages::product.add')
    ->name('add')
    ->middleware('permission:customer.product.add');

Route::livewire('/edit/{product}', 'pages::product.edit')
    ->name('edit')
    ->middleware('permission:customer.product.edit');

Route::livewire('/detail/{product}', 'pages::product.detail')
    ->name('detail')
    ->middleware('permission:customer.product.detail');
