<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\WorkerMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('login', 'auth.login')->name('login');
Route::view('register', 'auth.register');
Route::post('register', [AuthController::class, 'register']);

Route::group(
    ["prefix" => "auth", "as" => "auth."],
    function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/logout', [AuthController::class, 'logout']);
    }
);

Route::group(
    ["prefix" => "admin", 'middleware' => AdminMiddleware::class, "as" => "admin."],
    function () {
        Route::get('/', [DashboardController::class, 'admin']);
        Route::view('/water-analytics', 'admin.analytics');
        Route::view('/predictions', 'admin.prediction');
        Route::view('/water-management', 'admin.water-management');
        Route::view('/water-quality', 'admin.water-quality');
        Route::view('/monitoring', 'admin.monitoring');
        Route::view('/notifications', 'admin.notification');
        Route::view('/settings', 'admin.settings');
    }
);

Route::group(
    ["prefix" => "worker", 'middleware' => WorkerMiddleware::class, "as" => "worker."],
    function () {
        Route::get('/', function () {
            return 'Welcome Worker';
        });
    }
);

Route::group(
    ["prefix" => "chat", "as" => "chat."],
    function () {
        Route::view('/', 'chat.chat');
    }
);
