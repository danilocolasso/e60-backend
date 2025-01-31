<?php

namespace App\Repositories;

use App\Models\Branch;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BranchRepository
{

    private const SORT_MAP = [
        'admin' => 'admin_user_id',
        'rps' => 'rps_id',
    ];

    public function paginate(array $parameters): LengthAwarePaginator
    {
        $filters = [
            'query' => $parameters['query'] ?? null,
        ];

        $sort = $parameters['sort'] ?? 'id';
        $sort = self::SORT_MAP[$sort] ?? $sort;
        $order = $parameters['order'] ?? 'asc';
        $currentPage = $parameters['current_page'] ?? 1;
        $perPage = $parameters['per_page'] ?? 10;

        $query = Branch::query();

        if ($filters['query']) {
            $query->where(function ($query) use ($filters) {
                $query->where('name', 'ilike', "%{$filters['query']}%")
                    ->orWhere('phone', 'ilike', "%{$filters['query']}%");
            });
        }

        $query->orderBy($sort, $order);

        return $query->paginate($perPage, ['*'], 'page', $currentPage);
    }

    public function create(array $data): Branch
    {
        $data = $this->arrangeData($data);

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

    private function arrangeData(array $data): array
    {
        $data['pagseguro_data'] = [
            'email' => $data['pagseguro']['email'],
            'token' => $data['pagseguro']['token'],
            'key' => $data['pagseguro']['key'],
        ];
        $data['paypal_data'] = [
            'user' => $data['paypal']['user'],
            'password' => $data['paypal']['password'],
            'signature' => $data['paypal']['signature'],
        ];
        $data['enotas_data'] = [
            'api_key' => $data['enotas']['api_key'],
            'company_id' => $data['enotas']['company_id'],
        ];

        unset($data['pagseguro'], $data['paypal'], $data['enotas']);

        return $data;
    }
}
