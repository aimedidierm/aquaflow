<?php

use App\Enums\UserRole;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsumptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\MeasureController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\WorkerMiddleware;
use Illuminate\Support\Facades\Auth;
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
        Route::get('/water-analytics', [ConsumptionController::class, 'waterAnalytics']);
        Route::get('/predictions', [ConsumptionController::class, 'waterPredictions']);
        Route::get('/water-management', [ConsumptionController::class, 'waterManagement']);
        Route::get('/water-quality', [ConsumptionController::class, 'waterQuality']);
        Route::get('/monitoring', [ConsumptionController::class, 'waterMonitoring']);
        Route::get('/notifications', [NotificationController::class, 'index']);
        Route::view('/settings', 'admin.settings');
        Route::put('/settings', [AuthController::class, 'profile']);
        Route::get('report', [MeasureController::class, 'report']);
    }
);

Route::group(
    ["prefix" => "worker", 'middleware' => WorkerMiddleware::class, "as" => "worker."],
    function () {
        Route::get('/', [DashboardController::class, 'worker']);
        Route::get('/overview', [DashboardController::class, 'admin']);
        Route::get('/water-analytics', [ConsumptionController::class, 'waterAnalytics']);
        Route::get('/water-quality', [ConsumptionController::class, 'waterQuality']);
        Route::get('/notifications', [NotificationController::class, 'index']);
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
        Route::get('/', [MessageController::class, 'index']);
        Route::get('/chat-room/{chatId}', [MessageController::class, 'chatRoom'])->name('room');
        Route::post('/chat-room/{chatId}/send-message', [MessageController::class, 'store'])->name('sendMessage');
    }
);
