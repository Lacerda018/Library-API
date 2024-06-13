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

        $books = Book::all();

        return response()->json($books->toArray(), Response::HTTP_OK);

    }

//    public function store(Request $request)
//    {
//        $request->validate(
//            [
//                'title' =>
//
//            ]
//        );
//    }
}
