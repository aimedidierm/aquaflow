<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\WorkerMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('login', 'auth.login')->name('login');
Route::view('register', 'auth.register');

Route::group(
    ["prefix" => "auth", "as" => "auth."],
    function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/logout', [AuthController::class, 'logout']);
    }
);
Route::group(
    ["prefix" => "design", "as" => "design."],
    function () {
        Route::view('overview', 'design.overview');
        Route::view('analytics', 'design.analytics');
        Route::view('predictions', 'design.predictions');
        Route::view('chat', 'design.chat');
        Route::view('predictions', 'design.predictions');
        Route::view('water-management', 'design.water-management');
        Route::view('water-quality', 'design.water-quality');
        Route::view('monitoring', 'design.monitoring');
        Route::view('notification', 'design.notification');
    }
);

Route::group(
    ["prefix" => "admin", 'middleware' => AdminMiddleware::class, "as" => "admin."],
    function () {
        Route::get('/', function () {
            return 'Welcome Admin';
        });
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
