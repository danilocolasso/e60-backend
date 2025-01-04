<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\RpsIssuance;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RpsIssuanceRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = RpsIssuance::query();
        $searchableFields = [];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): RpsIssuance
    {
        return RpsIssuance::create($data);
    }

    public function update(RpsIssuance $model, array $data): RpsIssuance
    {
        $model->update($data);

        return $model;
    }

    public function delete(RpsIssuance $model): bool
    {
        return $model->delete();
    }
}
