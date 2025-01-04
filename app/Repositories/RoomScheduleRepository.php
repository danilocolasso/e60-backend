<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\RoomSchedule;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RoomScheduleRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = RoomSchedule::query();
        $searchableFields = ['token'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): RoomSchedule
    {
        return RoomSchedule::create($data);
    }

    public function update(RoomSchedule $model, array $data): RoomSchedule
    {
        $model->update($data);

        return $model;
    }

    public function delete(RoomSchedule $model): bool
    {
        return $model->delete();
    }
}
