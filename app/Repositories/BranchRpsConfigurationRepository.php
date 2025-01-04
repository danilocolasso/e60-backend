<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\BranchRpsConfiguration;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BranchRpsConfigurationRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = BranchRpsConfiguration::query();
        $searchableFields = ['format'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): BranchRpsConfiguration
    {
        return BranchRpsConfiguration::create($data);
    }

    public function update(BranchRpsConfiguration $model, array $data): BranchRpsConfiguration
    {
        $model->update($data);

        return $model;
    }

    public function delete(BranchRpsConfiguration $model): bool
    {
        return $model->delete();
    }
}
