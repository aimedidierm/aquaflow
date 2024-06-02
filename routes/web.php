<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('login', 'auth.login');
Route::view('register', 'auth.register');

Route::group(["prefix" => "design", "as" => "design."], function () {
    Route::view('overview', 'design.overview');
    Route::view('analytics', 'design.analytics');
    Route::view('predictions', 'design.predictions');
});
