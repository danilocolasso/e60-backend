<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::get('/address/states/options', [AddressController::class, 'statesOptions']);
