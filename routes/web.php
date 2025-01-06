<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route untuk tampilan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route untuk proses login berdasarkan peran
Route::post('/login', [LoginController::class, 'process'])->name('login.process');
