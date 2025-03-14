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

Route::get('/', function () {
    return view('login');
})->name('login')->middleware('guest');



Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

