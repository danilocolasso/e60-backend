<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomScheduleResource;
use App\Models\RoomSchedule;
use App\Repositories\RoomScheduleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomScheduleScheduleController extends Controller
{
    private RoomScheduleRepository $repository;

    public function __construct(RoomScheduleRepository $repository)
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
            'room_id' => 'required|integer|exists:rooms,id',
            'user_id' => 'required|integer|exists:users,id',
            // 'booking_id' => 'nullable|integer|exists:bookings,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'token' => 'nullable|string|max:11',
            'price' => 'required|numeric|min:0',
            'blocked_schedule' => 'nullable|date',
            'blocking_history' => 'nullable|string',
        ]);

        $return = $this->repository->create($data);

        return response()->json($return);
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomSchedule $model): JsonResponse
    {
        return response()->json($model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomSchedule $model): JsonResponse
    {
        return response()->json(new RoomScheduleResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomSchedule $model): JsonResponse
    {
        $data = $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'room_id' => 'required|integer|exists:rooms,id',
            'user_id' => 'required|integer|exists:users,id',
            // 'booking_id' => 'nullable|integer|exists:bookings,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'token' => 'nullable|string|max:11',
            'price' => 'required|numeric|min:0',
            'blocked_schedule' => 'nullable|date',
            'blocking_history' => 'nullable|string',
        ]);

        $model = $this->repository->update($model, $data);

        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomSchedule $model): Response
    {
        $model->delete();

        return response()->noContent();
    }
}
