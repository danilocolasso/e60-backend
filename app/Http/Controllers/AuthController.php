<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6|same:password',
        ]);

        $user = User::create($data);

        auth()->login($user);

        return response()->json([
            'message' => 'Cadastro realizado com sucesso',
            'user' => $user,
        ]);
    }

    public function login(Request $request): JsonResponse
    {
        $data = $request->validate([
            'username' => 'required|string|min:3',
            'password' => 'required|string|min:6',
            'remember' => 'sometimes|boolean',
        ]);

        if (!Auth::attempt($data, $data['remember'] ?? false)) {
            return response()->json([
                'message' => 'Usuário ou senha inválidos',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $request->session()->regenerate();

        return response()->json([
            'message' => 'Login realizado com sucesso',
            'user' => Auth::user(),
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'message' => 'Logout realizado com sucesso',
        ]);
    }
}
