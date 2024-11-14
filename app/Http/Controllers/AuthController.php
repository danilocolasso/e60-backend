<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    private const TOKEN_NAME = 'E60';

    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6|same:password',
        ]);

        $user = User::create($data);

        return response()->json([
            'message' => 'User created successfully',
            'user' => [
                ...$user->toArray(),
                'token' => $user->createToken(self::TOKEN_NAME)->plainTextToken,
            ],
        ]);
    }

    public function login(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if (!Auth::attempt($data)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();

        return response()->json([
            ...$user->toArray(),
            'token' => $user->createToken(self::TOKEN_NAME)->plainTextToken,
        ]);
    }
}
