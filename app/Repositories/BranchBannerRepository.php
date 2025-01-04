<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\BranchBanner;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BranchBannerRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = BranchBanner::query();
        $searchableFields = ['title'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): BranchBanner
    {
        return BranchBanner::create($data);
    }

    public function update(BranchBanner $model, array $data): BranchBanner
    {
        $model->update($data);

        return $model;
    }
}
