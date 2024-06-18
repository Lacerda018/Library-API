<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(): JsonResponse
    {

        $book = Book::all();

        return response()->json($book->toArray(), Response::HTTP_OK);

    }

    public function show(Book $book): JsonResponse
    {
        return response()->json($book->toArray(), Response::HTTP_OK);
    }
    public function store(Request $request): JsonResponse
    {
        $request->validate(
            [
                'title' => 'required', 'string', 'max: 255',
                'author' => 'required', 'string', 'max:255',
                'year' => 'required', 'int', 'max:4',
                'genre' => 'required', 'int', 'max:255'
            ]
        );

        $book = Book::query()->create($request->all());

        return response()->json($book->toArray(), Response::HTTP_CREATED);
    }

    public function update(Request $request, Book $book): JsonResponse
    {
        $request->validate(
            [
                'title' => 'nullable', 'string', 'max: 255',
                'author' => 'nullable', 'string', 'max:255',
                'year' => 'nullable', 'int', 'max:4',
                'genre' => 'nullable', 'int', 'max:255'
            ]
        );

        $book->update($request->all());

        return response()->json($book->toArray(), Response::HTTP_OK);
    }

    public function delete(Book $book): Response
    {
        $book->delete();

        return response()->noContent();
    }
}
