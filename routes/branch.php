<?php

use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;

//TODO role check

Route::get('/branches/options', [BranchController::class, 'options']);
Route::resource('/branches', BranchController::class);
