<?php

namespace App\Repositories;

use App\Models\Branch;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BranchRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $filters = [
            'query' => $params['query'] ?? null,
        ];

        $sort = $params['sort'] ?? 'id';
        $order = $params['order'] ?? 'asc';
        $currentPage = $params['current_page'] ?? 1;
        $perPage = $params['per_page'] ?? 10;

        $query = Branch::query();

        if ($filters['query']) {
            $query->where(function ($query) use ($filters) {
                $query->where('name', 'ilike', "%{$filters['query']}%")
                    ->orWhere('cnpj', 'ilike', "%{$filters['query']}%")
                    ->orWhere('phone', 'ilike', "%{$filters['query']}%");
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
