<?php

use App\Livewire\CMS\Contact\ContactDetailPage;
use App\Livewire\CMS\Contact\ContactPage;
use Illuminate\Support\Facades\Route;

Route::any('', ContactPage::class)->name('index')->middleware('permission:contact');
Route::any('detail/{contact}', ContactDetailPage::class)->name('detail')->middleware('permission:contact.detail');
