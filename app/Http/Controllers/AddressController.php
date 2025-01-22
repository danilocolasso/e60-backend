<?php

namespace App\Http\Controllers;

use App\Enums\States;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    public function statesOptions(): JsonResponse
    {
        $options = array_map(
            static fn(States $state) => [
                'value' => $state->value,
                'label' => $state->name,
            ],
            States::cases()
        );

        return response()->json($options);
    }
}
