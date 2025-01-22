<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::resource('/customers', CustomerController::class);

Route::get('/customer/cnpj/{cnpj}', [CustomerController::class, 'consultCnpj']);
