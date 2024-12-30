<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository
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

        $query = User::query();

        if ($filters['query']) {
            $query->where(function ($query) use ($filters) {
                $query->where('name', 'ilike', "%{$filters['query']}%")
                    ->orWhere('email', 'ilike', "%{$filters['query']}%");
            });
        }

        $query->orderBy($sort, $order);

        return $query->paginate($perPage, ['*'], 'page', $currentPage);
    }

    public function create(array $data): User
    {
        $data['password'] = bcrypt($data['password']);
        unset($data['role']); // TODO

        return User::create($data);
    }

    public function update(User $user, array $data): User
    {
        if (array_key_exists('password', $data) && !$data['password']) {
            unset($data['password']);
        }

        $user->update($data);

        if (isset($data['branches'])) {
            $user->branches()->sync($data['branches']);
        }

        return $user;
    }
}
