<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\VerifyCsrfToken;

Route::get('/', [UserController::class, 'index']);
Route::get('/', [BookController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
