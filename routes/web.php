<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use \App\Http\Controllers\BookRentalController;

// --------- user ---------
Route::namespace('User')->group(function (){
    Route::get('/userIndex', [UserController::class, 'index']);

    Route::post('/users', [UserController::class, 'store']);

    Route::get('/users/{user}', [UserController::class, 'show']);

    Route::patch('/users/{user}', [UserController::class, 'update']);

    Route::delete('/users/{user}', [UserController::class, 'delete']);
});

// --------- book ---------
Route::namespace('Book')->group(function (){
    Route::get('/bookIndex', [BookController::class, 'index']);

    Route::post('/books', [BookController::class, 'store']);

    Route::get('/books/{book}', [BookController::class, 'show']);

    Route::patch('/books/{book}', [BookController::class, 'update']);

    Route::delete('/books/{book}', [BookController::class, 'delete']);
});

// --------- book rental ---------
Route::namespace('Book_rental')->group(function (){
    Route::get('/bookRentalIndex', [BookRentalController::class, 'index']);

    Route::get('/bookRentals/{bookRental}', [BookRentalController::class, 'show']);

    Route::post('/bookRentals', [BookRentalController::class, 'store']);

    Route::patch('/bookRentals/{bookRental}', [BookRentalController::class, 'update']);

    Route::delete('/bookRentals/{bookRental}', [BookRentalController::class, 'delete']);

});
