<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchUserResource;
use App\Models\BranchUser;
use App\Repositories\BranchUserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BranchUserController extends Controller
{
    private BranchUserRepository $repository;

    public function __construct(BranchUserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->repository->paginate(request()->all());

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'branch_id' => 'integer|exists:branches,id',
            'user_id' => 'integer|exists:users,id',
        ]);

        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(BranchUser $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchUser $model): JsonResponse
    {
        return response()->json(new BranchUserResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchUser $model): JsonResponse
    {
        $data = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchUser $model): Response
    {
        $model->delete();

        return response()->noContent();
    }
}
