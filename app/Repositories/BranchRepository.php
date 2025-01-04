<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\Branch;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BranchRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = Branch::query();
        $searchableFields = ['name', 'cnpj', 'phone'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): Branch
    {
        // TODO: create
        return Branch::create($data);
    }

    public function update(Branch $branch, array $data): Branch
    {
        // TODO update
        $branch->update($data);

        return $branch;
    }

    public function options(): Collection
    {
        return Branch::all()->map(function (Branch $branch) {
            return [
                'label' => $branch->name,
                'value' => $branch->id,
            ];
        });
    }
}
