<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::cms.profile')->name('index');
Route::livewire('/edit-profile', 'pages::cms.profile.edit-profile')->name('edit-profile');
Route::livewire('/change-password', 'pages::cms.profile.change-password')->name('change-password');
Route::livewire('/setting', 'pages::cms.profile.setting')->name('setting');
Route::livewire('/activity', 'pages::cms.profile.activity')->name('activity');
