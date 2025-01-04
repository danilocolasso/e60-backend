<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\BranchUser;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BranchUserRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = BranchUser::query();
        $searchableFields = ['branch_id'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): BranchUser
    {
        return BranchUser::create($data);
    }

    public function update(BranchUser $model, array $data): BranchUser
    {
        $model->update($data);

        return $model;
    }

    public function delete(BranchUser $model): bool
    {
        return $model->delete();
    }
}
