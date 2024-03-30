<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{view}', ApplicationController::class)->where('view', '(.*)');
