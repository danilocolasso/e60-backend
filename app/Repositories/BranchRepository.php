<?php

namespace App\Repositories;

use App\Models\Branch;
use Illuminate\Support\Collection;

class BranchRepository
{
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
