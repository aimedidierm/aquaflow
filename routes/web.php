<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('role:admin');

Route::get('/user', function () {
    return view('user.dashboard');
})->middleware('role:user');
Route::get('/chat', 'ChatController@index');
Route::get('/chat/{roomId}', 'ChatController@show');
Route::post('/chat/{roomId}/send', 'ChatController@sendMessage');
