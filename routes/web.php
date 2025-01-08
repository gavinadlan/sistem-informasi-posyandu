<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route untuk tampilan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route untuk proses login berdasarkan peran
Route::post('/login', [LoginController::class, 'process'])->name('login.process');

// Middleware untuk memastikan pengguna telah login
Route::middleware('auth')->group(function () {
    // Dashboard untuk Admin
    Route::get('/dashboard/admin', [DashboardController::class, 'adminDashboard'])
        ->name('dashboard.admin')
        ->middleware('role:admin');
    
    // Dashboard untuk Kader
    Route::get('/dashboard/kader', [DashboardController::class, 'kaderDashboard'])
        ->name('dashboard.kader')
        ->middleware('role:kader');
    
    // Dashboard untuk Ibu Balita
    Route::get('/dashboard/ibu_balita', [DashboardController::class, 'ibuBalitaDashboard'])
        ->name('dashboard.ibu_balita')
        ->middleware('role:ibu_balita');
});

// Route untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
