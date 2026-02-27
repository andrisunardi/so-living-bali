<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::hotel-inquiry')
    ->name('index')
    ->middleware('permission:customer.hotel_inquiry');

Route::livewire('/add', 'pages::hotel-inquiry.add')
    ->name('add')
    ->middleware('permission:customer.hotel_inquiry.add');

Route::livewire('/edit/{hotelInquiry}', 'pages::hotel-inquiry.edit')
    ->name('edit')
    ->middleware('permission:customer.hotel_inquiry.edit');

Route::livewire('/detail/{hotelInquiry}', 'pages::hotel-inquiry.detail')
    ->name('detail')
    ->middleware('permission:customer.hotel_inquiry.detail');
