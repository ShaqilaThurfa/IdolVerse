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





Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('tables', [HomeController::class, 'tables'])->name('tables');
Route::get('billing', [HomeController::class, 'billing'])->name('billing');
