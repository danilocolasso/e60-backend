<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchPagseguroCredentialResource;
use App\Models\BranchPagseguroCredential;
use App\Repositories\BranchPagseguroCredentialRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BranchPagseguroCredentialController extends Controller
{
    private BranchPagseguroCredentialRepository $repository;

    public function __construct(BranchPagseguroCredentialRepository $repository)
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
            'token' => 'required|string|max:250',
            'email' => 'required|string|max:250',
            'client_id' => 'required|string|max:100',
            'client_secret' => 'required|string|max:100',
        ]);

        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(BranchPagseguroCredential $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchPagseguroCredential $model): JsonResponse
    {
        return response()->json(new BranchPagseguroCredentialResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchPagseguroCredential $model): JsonResponse
    {
        $data = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'token' => 'required|string|max:250',
            'email' => 'required|string|max:250',
            'client_id' => 'required|string|max:100',
            'client_secret' => 'required|string|max:100',
        ]);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchPagseguroCredential $model): Response
    {
        $model->delete();

        return response()->noContent();
    }
}
