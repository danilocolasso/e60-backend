<?php

namespace App\Http\Controllers;

use App\Http\Resources\DictionaryResource;
use App\Models\Dictionary;
use App\Repositories\DictionaryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DictionaryController extends Controller
{
    private DictionaryRepository $repository;

    public function __construct(DictionaryRepository $repository)
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
            'index' => 'required|string|max:250',
            'text_pt' => 'required|string',
            'text_en' => 'required|string',
            'text_es' => 'required|string',
        ]);

        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dictionary $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dictionary $model): JsonResponse
    {
        return response()->json(new DictionaryResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dictionary $model): JsonResponse
    {
        $data = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'index' => 'required|string|max:250',
            'text_pt' => 'required|string',
            'text_en' => 'required|string',
            'text_es' => 'required|string',
        ]);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }
}
