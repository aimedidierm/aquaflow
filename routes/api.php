<?php

use App\Http\Controllers\HardwareController;
use App\Http\Middleware\DisableCsrfForSpecificRoutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/status', [HardwareController::class, 'show']);
