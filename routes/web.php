<?php

use \Illuminate\Support\Facades\Route;

Route::middleware(['throttle:login'])->group(function () {
    require __DIR__.'/auth.php';
});

Route::middleware('auth:sanctum')->group(function () {
    require __DIR__ . '/user.php';
    require __DIR__ . '/customer.php';
    require __DIR__ . '/branch.php';
    require __DIR__ . '/address.php';
    require __DIR__ . '/coupon.php';
});
