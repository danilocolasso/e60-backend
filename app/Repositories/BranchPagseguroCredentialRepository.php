<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\BranchPagseguroCredential;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BranchPagseguroCredentialRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = BranchPagseguroCredential::query();
        $searchableFields = ['email'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): BranchPagseguroCredential
    {
        return BranchPagseguroCredential::create($data);
    }

    public function update(BranchPagseguroCredential $model, array $data): BranchPagseguroCredential
    {
        $model->update($data);

        return $model;
    }

    public function delete(BranchPagseguroCredential $model): bool
    {
        return $model->delete();
    }
}
