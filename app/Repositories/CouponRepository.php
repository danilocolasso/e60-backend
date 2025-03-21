<?php

namespace App\Repositories;

use App\Enums\Weekday;
use App\Models\Coupon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CouponRepository
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

        $query = Coupon::query();

        if ($filters['query']) {
            $query->where(function ($query) use ($filters) {
                $query->where('code', 'ilike', "%{$filters['query']}%");
            });
        }

        $query->orderBy($sort, $order);

        return $query->paginate($perPage, ['*'], 'page', $currentPage);
    }

    public function store(array $data): Coupon
    {
        // TODO: attach relationships

        $this->arrangeValidDays($data);

        return Coupon::create($data);
    }

    private function arrangeValidDays(array &$data): void
    {
        $validDays = $data['valid_days'];
        unset($data['valid_days']);

        foreach (Weekday::cases() as $day) {
            $fieldName = 'is_valid_' . $day->value;
            $data[$fieldName] = in_array($day->value, $validDays);
        }
    }
}
