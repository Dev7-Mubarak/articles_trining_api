<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    $name = 'Laravel';
    $value = 30;
    return view('hello')->with('name', $name)->with('value', $value);
});

Route::get('myBooking', 'App\Http\Controllers\BookingControlle');