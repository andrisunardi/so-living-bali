<?php

use App\Livewire\CMS\Contact\ContactAddPage;
use App\Livewire\CMS\Contact\ContactDetailPage;
use App\Livewire\CMS\Contact\ContactEditPage;
use App\Livewire\CMS\Contact\ContactPage;
use Illuminate\Support\Facades\Route;

Route::any('', ContactPage::class)->name('index')->middleware('permission:contact');
Route::any('add', ContactAddPage::class)->name('add')->middleware('permission:contact.add');
Route::any('edit/{contact}', ContactEditPage::class)->name('edit')->middleware('permission:contact.edit');
Route::any('detail/{contact}', ContactDetailPage::class)->name('detail')->middleware('permission:contact.detail');
