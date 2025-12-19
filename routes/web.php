<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;
use App\Models\Artikel; // 🟢 Tambahkan ini untuk ambil data dari model

// Halaman utama (Home)
Route::get('/', function () {
    // Jika user sudah login → langsung ke dashboard
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
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

// 🟢 Route dashboard (ambil semua artikel untuk ditampilkan)
Route::get('/dashboard', function () {
    $artikels = Artikel::with('penulis')->latest()->get(); // ambil artikel dari database
    return view('pages.dashboard', compact('artikels'));
})->middleware('auth')->name('dashboard');

// 🟢 Route CRUD Artikel (harus login)
Route::middleware(['auth'])->group(function () {
    Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/artikel/{artikel}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/artikel/{artikel}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/artikel/{artikel}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
});
