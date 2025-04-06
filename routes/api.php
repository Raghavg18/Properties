<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

Route::post('/properties', [PropertyController::class, 'store']);
Route::get('/properties', [PropertyController::class, 'index']);
Route::get('/properties/{id}', [PropertyController::class, 'show']);
