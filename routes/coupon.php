<?php

use App\Http\Controllers\CouponController;
use Illuminate\Support\Facades\Route;

Route::resource('/coupons', CouponController::class);
