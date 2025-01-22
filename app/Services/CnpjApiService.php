<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class CnpjApiService
{
    public function consult(string $cnpj): array
    {
        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'base_uri' => env('API_CNPJ_BASE_URI'),
        ]);

        $response = $client->get($cnpj);
        $data = json_decode($response->getBody()->getContents(), true);
        Log::log('info', 'CNPJ API response', $data);

        return $data;
    }
}
