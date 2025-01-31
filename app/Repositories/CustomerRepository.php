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
            });
        }

        $query->orderBy($sort, $order);

        return $query->paginate($perPage, ['*'], 'page', $currentPage);
    }

    public function store(array $data): Customer
    {
        $customer = Customer::create($data);

        if (isset($data['contacts'])) {
            $customer->contacts()->createMany($data['contacts']);
        }

        return $customer;
    }

    public function update(Customer $customer, array $data): Customer
    {
        if (array_key_exists('password', $data) && !$data['password']) {
            unset($data['password']);
        }

        $customer->update($data);

        if (isset($data['contacts'])) {
            $this->updateCustomerContacts($customer, $data['contacts']);
        }

        return $customer;
    }

    private function updateCustomerContacts(Customer $customer, array $contacts): void
    {
        if (empty($contacts)) {
            $customer->contacts()->delete();
            return;
        }

        $ids = collect($contacts)->pluck('id')->toArray();
        $customer->contacts()->whereNotIn('id', array_filter($ids))->delete();

        foreach ($contacts as $contact) {
            $customer->contacts()->updateOrCreate(['id' => $contact['id'] ?? null], $contact);
        }
    }
}
