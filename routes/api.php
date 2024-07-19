<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarkerController;

Route::get('/markers', [MarkerController::class, 'index']);
Route::post('/markers', [MarkerController::class, 'store']);

