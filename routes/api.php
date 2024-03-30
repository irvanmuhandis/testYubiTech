<?php

use Illuminate\Http\Request;
use App\Models\ColorNameMethod;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\ColorMethodController;
use App\Http\Controllers\ColorNameMethodController;
use App\Http\Controllers\ColorNameSalesStyleController;
use App\Http\Controllers\ColorMethodSalesStyleController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('sale')->group(function () {
    Route::get('/', [SalesOrderController::class, 'index']);
});

Route::get('/method', [ColorMethodController::class, 'index']);
Route::get('/name', [ColorNameMethodController::class, 'index']);
Route::get('/style', [StyleController::class, 'index']);
Route::get('/colormethodsales', [ColorMethodSalesStyleController::class, 'index']);
Route::get('/colornamesales', [ColorNameSalesStyleController::class, 'index']);
