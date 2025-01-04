<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchEnotaResource;
use App\Models\BranchEnota;
use App\Repositories\BranchEnotaRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BranchEnotaController extends Controller
{
    private BranchEnotaRepository $repository;

    public function __construct(BranchEnotaRepository $repository)
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
            'enotas_api_key' => 'required|string|max:250',
            'enotas_company_id' => 'required|string|max:250',
        ]);

        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(BranchEnota $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchEnota $model): JsonResponse
    {
        return response()->json(new BranchEnotaResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchEnota $model): JsonResponse
    {
        $data = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'enotas_api_key' => 'required|string|max:250',
            'enotas_company_id' => 'required|string|max:250',
        ]);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchEnota $model): Response
    {
        $model->delete();

        return response()->noContent();
    }
}
