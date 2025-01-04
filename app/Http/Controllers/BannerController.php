<?php

namespace App\Http\Controllers;

use App\Http\Resources\BannerResource;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BannerController extends Controller
{
    private BannerRepository $repository;

    public function __construct(BannerRepository $repository)
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
            'title' => 'required|string',
            'link' => 'required|string',
            'image' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $model): JsonResponse
    {
        return response()->json(new BannerResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $model): JsonResponse
    {
        $data = $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'image' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $model): Response
    {
        $model->delete();

        return response()->noContent();
    }
}
