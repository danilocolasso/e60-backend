<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchGiftcardResource;
use App\Models\BranchGiftcard;
use App\Repositories\BranchGiftcardRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BranchGiftcardController extends Controller
{
    private BranchGiftcardRepository $repository;

    public function __construct(BranchGiftcardRepository $repository)
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
            'giftcard_person_limit' => 'required|integer|min:1',
            'giftcard_value_per_person' => 'nullable|numeric|min:0',
        ]);

        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(BranchGiftcard $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchGiftcard $model): JsonResponse
    {
        return response()->json(new BranchGiftcardResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchGiftcard $model): JsonResponse
    {
        $data = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'giftcard_person_limit' => 'required|integer|min:1',
            'giftcard_value_per_person' => 'nullable|numeric|min:0',
        ]);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchGiftcard $model): Response
    {
        $model->delete();

        return response()->noContent();
    }
}
