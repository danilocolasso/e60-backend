<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Models\Room;
use App\Repositories\RoomRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomController extends Controller
{
    private RoomRepository $repository;

    public function __construct(RoomRepository $repository)
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
            'name_pt' => 'required|string|max:150',
            'name_en' => 'required|string|max:150',
            'name_es' => 'required|string|max:150',
            'description_br' => 'required|string',
            'description_en' => 'required|string',
            'description_es' => 'required|string',
            'image' => 'required|string|max:50',
            'image_cover' => 'required|string|max:50',
            'image_icon' => 'required|string|max:50',
            'participants_min' => 'required|integer|min:1',
            'participants_max' => 'required|integer|min:1',
            'duration_in_minutes' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
            'is_delivery' => 'nullable|boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'multiple_participants' => 'nullable|boolean',
            'link_room' => 'nullable|string|max:255',
        ]);


        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $model): JsonResponse
    {
        return response()->json(new RoomResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $model): JsonResponse
    {
        $data = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'name_pt' => 'required|string|max:150',
            'name_en' => 'required|string|max:150',
            'name_es' => 'required|string|max:150',
            'description_br' => 'required|string',
            'description_en' => 'required|string',
            'description_es' => 'required|string',
            'image' => 'required|string|max:50',
            'image_cover' => 'required|string|max:50',
            'image_icon' => 'required|string|max:50',
            'participants_min' => 'required|integer|min:1',
            'participants_max' => 'required|integer|min:1',
            'duration_in_minutes' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
            'is_delivery' => 'nullable|boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'multiple_participants' => 'nullable|boolean',
            'link_room' => 'nullable|string|max:255',
        ]);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $model): Response
    {
        $model->delete();

        return response()->noContent();
    }
}
