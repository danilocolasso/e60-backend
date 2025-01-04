<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\BranchGiftcard;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BranchGiftcardRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = BranchGiftcard::query();
        $searchableFields = ['giftcard_value_per_person'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): BranchGiftcard
    {
        return BranchGiftcard::create($data);
    }

    public function update(BranchGiftcard $model, array $data): BranchGiftcard
    {
        $model->update($data);

        return $model;
    }

    public function delete(BranchGiftcard $model): bool
    {
        return $model->delete();
    }
}
