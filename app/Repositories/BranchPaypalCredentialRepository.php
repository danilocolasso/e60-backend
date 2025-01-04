<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\BranchPaypalCredential;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BranchPaypalCredentialRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = BranchPaypalCredential::query();
        $searchableFields = ['user'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): BranchPaypalCredential
    {
        return BranchPaypalCredential::create($data);
    }

    public function update(BranchPaypalCredential $model, array $data): BranchPaypalCredential
    {
        $model->update($data);

        return $model;
    }

    public function delete(BranchPaypalCredential $model): bool
    {
        return $model->delete();
    }
}
