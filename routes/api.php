<?php

use App\Http\Controllers\HardwareController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/status', [HardwareController::class, 'show']);

Route::group(
    ["prefix" => "chat", "middleware" => "auth"],
    function () {
        Route::get('/listing', [MessageController::class, 'index']);
        Route::get('/chat-room/{id}', [MessageController::class, 'chatRoom']);
        Route::post('/send-message/{id}', [MessageController::class, 'store']);
    }
);
