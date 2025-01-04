<?php

namespace App\Repositories;

use App\Helpers\PaginatorHelper;
use App\Models\Dictionary;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DictionaryRepository
{
    public function paginate(array $params): LengthAwarePaginator
    {
        $query = Dictionary::query();
        $searchableFields = ['index', 'text_pt'];

        return PaginatorHelper::paginate($query, $params, $searchableFields);
    }

    public function create(array $data): Dictionary
    {
        return Dictionary::create($data);
    }

    public function update(Dictionary $model, array $data): Dictionary
    {
        $model->update($data);

        return $model;
    }
}
