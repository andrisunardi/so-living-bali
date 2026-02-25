<?php

use App\Livewire\CMS\District\DistrictAddPage;
use App\Livewire\CMS\District\DistrictDetailPage;
use App\Livewire\CMS\District\DistrictEditPage;
use App\Livewire\CMS\District\DistrictPage;
use Illuminate\Support\Facades\Route;

Route::any('', DistrictPage::class)->name('index')->middleware('permission:district');
Route::any('add', DistrictAddPage::class)->name('add')->middleware('permission:district.add');
Route::any('edit/{district}', DistrictEditPage::class)->name('edit')->middleware('permission:district.edit');
Route::any('detail/{district}', DistrictDetailPage::class)->name('detail')->middleware('permission:district.detail');
