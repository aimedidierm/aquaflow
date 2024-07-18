<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsumptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\MessageController;
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
        Route::get('/notifications', function () {
            $notifications = [
                (object) [
                    'sender' => 'Karigirwa.eth',
                    'message' => 'God is God, all the time and we are here as children of God...',
                    'timestamp' => '3 min ago',
                ],
                // Add more notifications as needed
            ];

            return view('admin.notification', ['notifications' => $notifications]);
        });
        Route::get('/settings', function () {
            return view('admin.settings');
        });
        Route::view('/settings', 'admin.settings');
    }
);

Route::group(
    ["prefix" => "worker", 'middleware' => WorkerMiddleware::class, "as" => "worker."],
    function () {
        Route::get('/', [DashboardController::class, 'worker']);
        Route::view('/overview', 'worker.overview');
        Route::view('/water-analytics', 'worker.analytics');
        Route::view('/water-quality', 'worker.water-quality');
        Route::get('/notifications', function () {
            $notifications = [
                (object) [
                    'sender' => 'Karigirwa.eth',
                    'message' => 'God is God, all the time and we are here as children of God...',
                    'timestamp' => '3 min ago',
                ],
            ];

            return view('worker.notification', ['notifications' => $notifications]);
        });
        Route::get('/settings', function () {
            return view('worker.settings');
        });
        Route::post('/distributions', [DistributionController::class, 'store']);
        Route::post('/consumptions', [ConsumptionController::class, 'store']);
    }
);

Route::group(
    ["prefix" => "chat", "as" => "chat."],
    function () {
        Route::view('/', 'chat.chat');
    }
);
