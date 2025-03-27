<?php

use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;

Route::get('/branches/options', [BranchController::class, 'options']);
Route::get('/branches/{branch}/rooms/options', [BranchController::class, 'roomsOptions']);
Route::get('/branches/type/options', [BranchController::class, 'typeOptions']);
Route::get('branches/rps-special-tax-regime-invoice/options', [BranchController::class, 'rpsSpecialTaxRegimeInvoiceOptions']);
Route::get('/branches/rps-format/options', [BranchController::class, 'rpsFormatOptions']);
Route::get('/branches/rps-simples-national-optant/options', [BranchController::class, 'rpsSimplesNationalOptantOptions']);
Route::get('/branches/rps-tax-service-invoice/options', [BranchController::class, 'rpsTaxServiceInvoiceOptions']);

Route::resource('/branches', BranchController::class);
