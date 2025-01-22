<?php

namespace App\Http\Controllers;

use App\Enums\State;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    public function statesOptions(): JsonResponse
    {
        $options = array_map(
            static fn(State $state) => [
                'value' => $state->value,
                'label' => $state->name,
            ],
            State::cases()
        );

        return response()->json($options);
    }
}
