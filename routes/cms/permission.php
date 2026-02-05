<?php

use App\Livewire\CMS\Permission\PermissionAddPage;
use App\Livewire\CMS\Permission\PermissionDetailPage;
use App\Livewire\CMS\Permission\PermissionEditPage;
use App\Livewire\CMS\Permission\PermissionPage;
use Illuminate\Support\Facades\Route;

Route::any('', PermissionPage::class)->name('index')->middleware('permission:role');
Route::any('add', PermissionAddPage::class)->name('add')->middleware('permission:role.add');
Route::any('edit/{permission}', PermissionEditPage::class)->name('edit')->middleware('permission:permission.edit');
Route::any('detail/{permission}', PermissionDetailPage::class)->name('detail')->middleware('permission:role.detail');
