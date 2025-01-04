<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\Banner;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BannerRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = Banner::query();
        $searchableFields = ['branch_id', 'banner_id'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): Banner
    {
        return Banner::create($data);
    }

    public function update(Banner $model, array $data): Banner
    {
        $model->update($data);

        return $model;
    }

    public function delete(Banner $model): bool
    {
        return $model->delete();
    }
}
