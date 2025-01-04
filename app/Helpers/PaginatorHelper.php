<?php

namespace App\Helpers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class PaginatorHelper
{
    /**
     * Pagina um query builder com base nos parâmetros fornecidos.
     *
     * @param Builder $query
     * @param array $params
     * @param array $searchableFields
     * @return LengthAwarePaginator
     */
    public static function paginate(Builder $query, array $params, array $searchableFields = []): LengthAwarePaginator
    {
        $filters = [
            'query' => $params['query'] ?? null,
        ];

        $sort = $params['sort'] ?? 'id';
        $order = $params['order'] ?? 'asc';
        $currentPage = $params['current_page'] ?? 1;
        $perPage = $params['per_page'] ?? 10;

        if ($filters['query'] && $searchableFields) {
            $query->where(function ($query) use ($filters, $searchableFields) {
                foreach ($searchableFields as $field) {
                    $query->orWhere($field, 'ilike', "%{$filters['query']}%");
                }
            });
        }

        $query->orderBy($sort, $order);

        return $query->paginate($perPage, ['*'], 'page', $currentPage);
    }
}
