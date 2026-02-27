<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::profile')->name('index');
Route::livewire('/edit-profile', 'pages::profile.edit-profile')->name('edit-profile');
Route::livewire('/change-password', 'pages::profile.change-password')->name('change-password');
Route::livewire('/setting', 'pages::profile.setting')->name('setting');
Route::livewire('/activity', 'pages::profile.activity')->name('activity');
