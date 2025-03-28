<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Resources\RoomListResource;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use App\Repositories\RoomRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class RoomController extends Controller
{
    public function __construct(
        private readonly RoomRepository $roomRepository
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        Gate::authorize('viewAny', Room::class);

        $rooms = $this->roomRepository->paginate(request()->all());

        return RoomListResource::collection($rooms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request): JsonResponse
    {
        $data = $request->validated();

        $room = Room::create($data);

        return response()->json($room);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room): JsonResponse
    {
        Gate::authorize('view', $room);

        return response()->json(new RoomResource($room));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room): JsonResponse
    {
        Gate::authorize('update', $room);

        return response()->json(new RoomResource($room));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room): JsonResponse
    {
        $data = $request->validated();

        $room->update($data);

        return response()->json($room);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room): Response
    {
        Gate::authorize('delete', Room::class);

        $room->delete();

        return response()->noContent();
    }
}
