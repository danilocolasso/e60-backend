<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchRpsConfigurationResource;
use App\Models\BranchRpsConfiguration;
use App\Repositories\BranchRpsConfigurationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BranchRpsConfigurationController extends Controller
{
    private BranchRpsConfigurationRepository $repository;

    public function __construct(BranchRpsConfigurationRepository $repository)
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
            'branch_id' => 'nullable|integer|exists:branches,id',
            'tax_rate' => 'nullable|numeric',
            'service_code' => 'nullable|string|max:5',
            'federal_service_code' => 'nullable|string|max:20',
            'municipal_service_code' => 'nullable|string|max:20',
            'municipal_taxation_code' => 'nullable|string|max:45',
            'format' => 'nullable|string|max:20',
            'service_item_list' => 'nullable|string|max:45',
            'simple_national_optant' => 'nullable|boolean',
            'special_trib_regime' => 'nullable|string|max:2',
            'service_trib_code' => 'nullable|string|max:2',
            'last_rps_number' => 'nullable|integer',
        ]);

        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(BranchRpsConfiguration $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchRpsConfiguration $model): JsonResponse
    {
        return response()->json(new BranchRpsConfigurationResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchRpsConfiguration $model): JsonResponse
    {
        $data = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'tax_rate' => 'required|numeric',
            'service_code' => 'required|string|max:5',
            'federal_service_code' => 'required|string|max:20',
            'municipal_service_code' => 'required|string|max:20',
            'municipal_taxation_code' => 'required|string|max:45',
            'format' => 'required|string|max:20',
            'service_item_list' => 'required|string|max:45',
            'simple_national_optant' => 'required|boolean',
            'special_trib_regime' => 'required|string|max:2',
            'service_trib_code' => 'required|string|max:2',
            'last_rps_number' => 'required|integer',
        ]);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchRpsConfiguration $model): Response
    {
        $model->delete();

        return response()->noContent();
    }
}
