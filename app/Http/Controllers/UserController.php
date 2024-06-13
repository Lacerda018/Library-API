<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Middleware\VerifyCsrfToken;
class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $user = User::all();

        return response()->json($user->toArray(), Response::HTTP_OK);

    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email:rfc,filter', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8']
            ]
        );

        $user = User::query()->create($request->all());

        return response()->json($user->toArray(), Response::HTTP_CREATED);
    }
}
