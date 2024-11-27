<?php

use Illuminate\Support\Facades\Route;

Route::get('/up', fn() => response()->json(['message' => 'Server is up and running!']));
