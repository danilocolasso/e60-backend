<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', fn() => response()->json(Auth::user()));
Route::get('/users/options', [UserController::class, 'options']);

Route::resource('/users', UserController::class);
