<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\BranchEnota;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BranchEnotaRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = BranchEnota::query();
        $searchableFields = ['enotas_company_id'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): BranchEnota
    {
        return BranchEnota::create($data);
    }

    public function update(BranchEnota $model, array $data): BranchEnota
    {
        $model->update($data);

        return $model;
    }

    public function delete(BranchEnota $model): bool
    {
        return $model->delete();
    }
}
