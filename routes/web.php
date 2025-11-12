<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Halaman utama (Home)
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Grup route untuk tamu (belum login)
Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Route logout (hanya untuk user yang sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Route dashboard (hanya untuk user login)
Route::get('/dashboard', function() {
    return view('pages.dashboard');
})->middleware('auth')->name('dashboard');
