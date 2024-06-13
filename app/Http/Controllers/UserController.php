<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $user = User::all();

        return response()->json($user->toArray(), Response::HTTP_OK);

    }

    public function show(User $user): JsonResponse
    {
        return response()->json($user->toArray(), Response::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
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

    public function update(User $user, Request $request): JsonResponse
    {
        $request->validate(
            [
                'first_name' => ['nullable', 'string', 'max:255'],
                'last_name' => ['nullable', 'string', 'max:255'],
                'email' => ['nullable', 'string', 'email:rfc,filter', 'max:255', 'unique:users'],
                'password' => ['nullable', 'string', 'min:8']
            ]
        );

        $user->update($request->all());

        return response()->json($user->refresh()->toArray(), Response::HTTP_OK);
    }

    public function delete(User $user): Response
    {
        $user->delete();

        return response()->noContent();
    }
}
