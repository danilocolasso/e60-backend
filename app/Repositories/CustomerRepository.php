<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CustomerRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = Customer::query();
        $searchableFields = ['name', 'email', 'cpf', 'mobile_number', 'phone_number'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): Customer
    {
        return Customer::create($data);
    }

    public function update(Customer $model, array $data): Customer
    {
        $model->update($data);

        return $model;
    }

    public function delete(Customer $model): bool
    {
        return $model->delete();
    }
}
