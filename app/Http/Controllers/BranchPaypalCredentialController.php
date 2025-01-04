<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchPaypalCredentialResource;
use App\Models\BranchPaypalCredential;
use App\Repositories\BranchPaypalCredentialRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BranchPaypalCredentialController extends Controller
{
    private BranchPaypalCredentialRepository $repository;

    public function __construct(BranchPaypalCredentialRepository $repository)
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
            'branch_id' => 'required|integer|exists:branches,id',
            'user' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            'signature' => 'required|string|max:255',
        ]);

        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(BranchPaypalCredential $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchPaypalCredential $model): JsonResponse
    {
        return response()->json(new BranchPaypalCredentialResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchPaypalCredential $model): JsonResponse
    {
        $data = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'user' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            'signature' => 'required|string|max:255',
        ]);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchPaypalCredential $model): Response
    {
        $model->delete();

        return response()->noContent();
    }
}
