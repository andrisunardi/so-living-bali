<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::sales-outbound')
    ->name('index')
    ->middleware('permission:customer.sales_outbound');

Route::livewire('/add', 'pages::sales-outbound.add')
    ->name('add')
    ->middleware('permission:customer.sales_outbound.add');

Route::livewire('/edit/{salesOutbound}', 'pages::sales-outbound.edit')
    ->name('edit')
    ->middleware('permission:customer.sales_outbound.edit');

Route::livewire('/detail/{salesOutbound}', 'pages::sales-outbound.detail')
    ->name('detail')
    ->middleware('permission:customer.sales_outbound.detail');
