<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::sleekflow-log')
    ->name('index')
    ->middleware('permission:customer.sleekflow_log');

Route::livewire('/detail/{sleekflowLog}', 'pages::sleekflow-log.detail')
    ->name('detail')
    ->middleware('permission:customer.sleekflow_log.detail');
