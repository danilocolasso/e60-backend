<?php

namespace App\Repositories;

use App\Enums\Weekday;
use App\Models\Coupon;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    /**
     * @throws Exception
     */
    public function store(array $data): Coupon
    {
        try {
            return DB::transaction(function () use ($data) {
                $this->arrangeValidDays($data);

                $coupon = Coupon::create($data);

                $coupon->rooms()->sync($data['rooms']);

                return $coupon;
            });
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function update(Coupon $coupon, array $data): Coupon
    {
        try {
            return DB::transaction(function () use ($data, $coupon) {
                $this->arrangeValidDays($data);

                $coupon->update(Arr::except($data, ['id', 'rooms']));

                $coupon->rooms()->sync($data['rooms']);

                return $coupon;
            });
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
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
