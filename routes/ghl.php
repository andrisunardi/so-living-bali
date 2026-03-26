<?php

use App\Http\Controllers\GoHighLevelController;
use Illuminate\Support\Facades\Route;

Route::get('/oauth', [GoHighLevelController::class, 'oauth']);
Route::get('/refresh', [GoHighLevelController::class, 'refresh']);
