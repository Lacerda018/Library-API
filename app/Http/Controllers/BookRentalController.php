<?php

namespace App\Http\Controllers;

use App\Models\BookRental;
use \Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookRentalController extends Controller
{
    public function index():JsonResponse
    {
        $bookRental = BookRental::all();

        return response()->json($bookRental->toArray(), Response::HTTP_OK);
    }

    public function show(BookRental $bookRental): JsonResponse
    {
        return response()->json($bookRental->toArray(), Response::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate(
            [
                'user_id' => 'required', 'exist:users,id',
                'book_id' => 'required', 'exist:book,id',
                'rented_at' => 'required', 'date',
                'returned_at' => 'nullable', 'date'
            ]
        );

        $bookRental = BookRental::query()->create($request->all());

        return response()->json($bookRental->toArray(), Response::HTTP_CREATED);
    }

    public function update(Request $request,BookRental $bookRental): JsonResponse
    {
        $request->validate(
            [
                'user_id' => 'nullable', 'exist:users,id',
                'book_id' => 'nullable', 'exist:book,id',
                'rented_at' => 'nullable', 'date',
                'returned_at' => 'nullable', 'date'
            ]
        );

        $bookRental->update($request->all());

        return response()->json($bookRental->toArray(), Response::HTTP_OK);
    }

    public function delete(BookRental $bookRental): Response
    {
        $bookRental->delete();

        return response()->noContent();
    }
}
