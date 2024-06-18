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
Route::get('/bookIndex', [BookController::class, 'index']);

Route::post('/books', [BookController::class, 'store']);

Route::get('/books/{book}', [BookController::class, 'show']);

Route::patch('/books/{book}', [BookController::class, 'update']);

Route::delete('/books/{book}', [BookController::class, 'delete']);

