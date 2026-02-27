<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::contact-subject')
    ->name('index')
    ->middleware('permission:customer.contact_subject');

Route::livewire('/add', 'pages::contact-subject.add')
    ->name('add')
    ->middleware('permission:customer.contact_subject.add');

Route::livewire('/edit/{contactSubject}', 'pages::contact-subject.edit')
    ->name('edit')
    ->middleware('permission:customer.contact_subject.edit');

Route::livewire('/detail/{contactSubject}', 'pages::contact-subject.detail')
    ->name('detail')
    ->middleware('permission:customer.contact_subject.detail');
