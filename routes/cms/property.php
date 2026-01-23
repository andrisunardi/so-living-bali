<?php

use App\Livewire\CMS\Property\PropertyAddPage;
use App\Livewire\CMS\Property\PropertyDetailPage;
use App\Livewire\CMS\Property\PropertyEditPage;
use App\Livewire\CMS\Property\PropertyPage;
use Illuminate\Support\Facades\Route;

Route::any('', PropertyPage::class)->name('index')->middleware('permission:property');
Route::any('add', PropertyAddPage::class)->name('add')->middleware('permission:property.add');
Route::any('edit/{property}', PropertyEditPage::class)->name('edit')->middleware('permission:property.edit');
Route::any('detail/{property}', PropertyDetailPage::class)->name('detail')->middleware('permission:property.detail');
