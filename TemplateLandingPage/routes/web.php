<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/portfolio-details', function () {
    return view('portfolio-details');
});

Route::get('/service-details', function () {
    return view('service-details');
});

Route::post('/send-contact', [FormController::class, 'sendContact']);
Route::post('/subscribe-newsletter', [FormController::class, 'subscribeNewsletter']);
