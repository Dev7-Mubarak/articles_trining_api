<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    $name = 'Laravel';
    $value = 30;
    return view('hello')->with('name', $name)->with('value', $value);
});

Route::get('myBooking', BookingController::class . '@myBooking');

