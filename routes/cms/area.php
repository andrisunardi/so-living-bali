<?php

use App\Livewire\CMS\Area\AreaAddPage;
use App\Livewire\CMS\Area\AreaDetailPage;
use App\Livewire\CMS\Area\AreaEditPage;
use App\Livewire\CMS\Area\AreaPage;
use Illuminate\Support\Facades\Route;

Route::any('', AreaPage::class)->name('index')->middleware('permission:area');
Route::any('add', AreaAddPage::class)->name('add')->middleware('permission:area.add');
Route::any('edit/{area}', AreaEditPage::class)->name('edit')->middleware('permission:area.edit');
Route::any('detail/{area}', AreaDetailPage::class)->name('detail')->middleware('permission:area.detail');
