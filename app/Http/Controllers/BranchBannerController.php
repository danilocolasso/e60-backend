<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchBannerResource;
use App\Models\BranchBanner;
use App\Repositories\BranchBannerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BranchBannerController extends Controller
{
    private BranchBannerRepository $repository;

    public function __construct(BranchBannerRepository $repository)
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
            'banner_id' => 'required|integer|exists:banners,id',
        ]);

        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(BranchBanner $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchBanner $model): JsonResponse
    {
        return response()->json(new BranchBannerResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchBanner $model): JsonResponse
    {
        $data = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'banner_id' => 'required|integer|exists:banners,id',
        ]);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }
}
