<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// landing page
Route::get('/', function () {
    return view('landing');
});



Route::get('/', function () {
    return view('landing.index');
});

Route::get('/portfolio-details', function () {
    return view('landing.portfolio-details');
});

Route::get('/service-details', function () {
    return view('landing.service-details');
});

Route::post('/send-contact', [FormController::class, 'sendContact']);
Route::post('/subscribe-newsletter', [FormController::class, 'subscribeNewsletter']);
