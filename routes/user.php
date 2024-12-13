<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//TODO role check
Route::get('/user', fn() => response()->json(Auth::user()));

Route::resource('/users', UserController::class);
