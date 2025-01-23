<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserListResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

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
    public function index(Request $request): ResourceCollection
    {
        Gate::authorize('viewAny', User::class);

        $users = $this->userRepository->paginate($request->all());

        return UserListResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        Gate::authorize('create', User::class);

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
        Gate::authorize('view', $user);

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): JsonResponse
    {
        Gate::authorize('update', $user);

        return response()->json(new UserResource($user));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): JsonResponse
    {
        Gate::authorize('update', $user);

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
        Gate::authorize('delete', $user);

        $user->delete();

        return response()->noContent();
    }
}
