<?php

use App\Livewire\CMS\User\UserAddPage;
use App\Livewire\CMS\User\UserDetailPage;
use App\Livewire\CMS\User\UserEditPage;
use App\Livewire\CMS\User\UserPage;
use Illuminate\Support\Facades\Route;

Route::any('', UserPage::class)->name('index')->middleware('permission:user');
Route::any('add', UserAddPage::class)->name('add')->middleware('permission:user.add');
Route::any('edit/{user}', UserEditPage::class)->name('edit')->middleware('permission:user.edit');
Route::any('detail/{user}', UserDetailPage::class)->name('detail')->middleware('permission:user.detail');
