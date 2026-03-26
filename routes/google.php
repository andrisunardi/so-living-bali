<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/redirect', [GoogleController::class, 'redirect'])->name('redirect');
Route::get('/callback', [GoogleController::class, 'callback'])->name('callback');
