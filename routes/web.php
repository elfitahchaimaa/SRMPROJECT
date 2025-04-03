<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaieController;

// 🏠 Page d'accueil
Route::get('/', [AccueilController::class, 'index'])->name('accueil.index');
Route::post('/services', [AccueilController::class, 'store'])->name('services.store');

// Authentification
Route::get('/login', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// 🔑 Mot de passe oublié
Route::get('/password/reset', [AuthController::class, 'forgotPasswordForm'])->name('password.request')->middleware('guest');
Route::post('/password/reset', [AuthController::class, 'sendResetLink'])->name('password.email')->middleware('guest');

// 📊 Dashboard (sans middleware)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
