<?php

namespace App\Http\Controllers;

use App\Enums\RpsIssuanceRoles;
use App\Http\Resources\RpsIssuanceResource;
use App\Models\RpsIssuance;
use App\Repositories\RpsIssuanceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RpsIssuanceController extends Controller
{
    private RpsIssuanceRepository $repository;

    public function __construct(RpsIssuanceRepository $repository)
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
            'start_datetime' => 'required|date',
            'records' => 'nullable|integer|min:0',
            'total_value' => 'required|numeric|min:0',
            'status' => 'required|in:' . implode(',', array_column(RpsIssuanceRoles::cases(), 'value')),
            'first_rps_number' => 'nullable|integer|min:0',
        ]);

        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(RpsIssuance $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RpsIssuance $model): JsonResponse
    {
        return response()->json(new RpsIssuanceResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RpsIssuance $model): JsonResponse
    {
        $data = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'start_datetime' => 'required|date',
            'records' => 'nullable|integer|min:0',
            'total_value' => 'required|numeric|min:0',
            'status' => 'required|in:' . implode(',', array_column(RpsIssuanceRoles::cases(), 'value')),
            'first_rps_number' => 'nullable|integer|min:0',
        ]);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RpsIssuance $model): Response
    {
        $model->delete();

        return response()->noContent();
    }
}
