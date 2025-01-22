<?php

use App\Services\CnpjApiService;
use Illuminate\Http\Response;
use Tests\TestCase;

uses(TestCase::class);

test('Service returns valid data for a CNPJ', function () {
    // Arrange
    $service = new CnpjApiService();
    $cnpj = '27865757000102';

    // Act
    $response = $service->consult($cnpj);

    // Assert
    expect($response)
        ->toBeArray()
        ->and($response)->toHaveKey('status')
        ->and($response['status'])->toBe(Response::$statusTexts[Response::HTTP_OK])
        ->and($response)->toHaveKeys(['cnpj', 'nome', 'fantasia']);
});
