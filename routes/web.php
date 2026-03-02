<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route ini bisa diakses publik (tanpa login)
Route::get('/', function () {
    return view('welcome');
});

// Pindahkan baris ini ke luar dari grup middleware('auth')
Route::get('/about', [ProfileController::class, 'about']);

// Route yang butuh login (hanya untuk user terdaftar)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';