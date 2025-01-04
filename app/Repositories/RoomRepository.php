<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\Room;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RoomRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = Room::query();
        $searchableFields = ['name_pt', 'name_en', 'name_es', 'link_room'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): Room
    {
        return Room::create($data);
    }

    public function update(Room $model, array $data): Room
    {
        $model->update($data);

        return $model;
    }

    public function delete(Room $model): bool
    {
        return $model->delete();
    }
}
