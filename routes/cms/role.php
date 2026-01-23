<?php

use App\Livewire\CMS\Role\RoleAddPage;
use App\Livewire\CMS\Role\RoleDetailPage;
use App\Livewire\CMS\Role\RoleEditPage;
use App\Livewire\CMS\Role\RolePage;
use Illuminate\Support\Facades\Route;

Route::any('', RolePage::class)->name('index')->middleware('permission:role');
Route::any('add', RoleAddPage::class)->name('add')->middleware('permission:role.add');
Route::any('edit/{role}', RoleEditPage::class)->name('edit')->middleware('permission:role.edit');
Route::any('detail/{role}', RoleDetailPage::class)->name('detail')->middleware('permission:role.detail');
