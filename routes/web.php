<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;

// --------- user ---------
Route::get('/user_index', [UserController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);

Route::get('/users/{user}', [UserController::class, 'show']);

Route::patch('/users/{user}', [UserController::class, 'update']);

Route::delete('/users/{user}', [UserController::class, 'delete']);

// --------- book ---------
Route::get('/book_index', [BookController::class, 'index']);

