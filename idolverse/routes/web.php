<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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



Route::get('/register', function () {
    return view('register');
})->name('register');

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);



Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Proses login mysql -u root -p qns < /root/hotspot_location_wifiid_202503201150.sql

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('api');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('tables', [HomeController::class, 'tables'])->name('tables');
Route::get('billing', [HomeController::class, 'billing'])->name('billing');
