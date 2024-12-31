<?php

namespace App\Repositories;

use App\Models\Branch;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BranchRepository
{
    public function paginate(array $parameters): LengthAwarePaginator
    {
        $filters = [
            'query' => $parameters['query'] ?? null,
        ];

        $sort = $parameters['sort'] ?? 'id';
        $order = $parameters['order'] ?? 'asc';
        $currentPage = $parameters['current_page'] ?? 1;
        $perPage = $parameters['per_page'] ?? 10;

        $query = Branch::query();

        if ($filters['query']) {
            $query->where(function ($query) use ($filters) {
                $query->where('name', 'ilike', "%{$filters['query']}%");
                // TODO: Add more fields to search
            });
        }

        $query->orderBy($sort, $order);

        return $query->paginate($perPage, ['*'], 'page', $currentPage);
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
