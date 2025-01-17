<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CustomerRepository
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

        $query = Customer::query();

        if ($filters['query']) {
            $query->where(function ($query) use ($filters) {
                $query->where('name', 'ilike', "%{$filters['query']}%")
                    ->orWhere('email', 'ilike', "%{$filters['query']}%")
                    ->orWhere('document_number', 'ilike', "%{$filters['query']}%")
                    ->orWhere('phone', 'ilike', "%{$filters['query']}%");
                // TODO only numbers in document_number and phone on database
            });
        }

        $query->orderBy($sort, $order);

        return $query->paginate($perPage, ['*'], 'page', $currentPage);
    }

    public function update(Customer $customer, array $data): Customer
    {
        if (array_key_exists('password', $data) && !$data['password']) {
            unset($data['password']);
        }

        $customer->update($data);

        return $customer;
    }
}
