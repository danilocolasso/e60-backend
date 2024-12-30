<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $users = $this->userRepository->paginate($request->all());

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'username' => 'required|string',
            'password' => 'required|string',
            'password_confirmation' => 'required|string',
            'role' => 'required|string',
            'branches' => 'array',
            'management_report_show' => 'boolean',
        ]);

        $user = $this->userRepository->create($data);

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): JsonResponse
    {
        return response()->json(new UserResource($user));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): JsonResponse
    {
        $data = $request->validate([
            'name' => 'string',
            'email' => 'email',
            'username' => 'string',
            'password' => 'nullable|string',
            'password_confirmation' => 'nullable|string|required_with:password|string',
            'role' => 'required|string',
            'branches' => 'array',
            'management_report_show' => 'boolean',
        ]);

        $user = $this->userRepository->update($user, $data);

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): Response
    {
        $user->delete();

        return response()->noContent();
    }
}
