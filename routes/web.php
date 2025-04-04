<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\MaterielController;
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

// 📊 Dashboard - redirigé vers une autre page comme mesure temporaire
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// route de agent
Route::resource('agents', AgentController::class);
Route::resource('materiels', MaterielController::class);
Route::resource('materiels', MaterielController::class)->except(['show']);