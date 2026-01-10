<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AuthMiddleware;

Route::get('/', function () {
    return view('pages.landing');
})->name('landing');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');

// Admin routes - requires admin role
Route::middleware([AuthMiddleware::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/doctors', [AdminController::class, 'doctors'])->name('doctors');
    Route::get('/polis', [AdminController::class, 'polis'])->name('polis');
    Route::get('/queues', [AdminController::class, 'queues'])->name('queues');
});

// User routes - requires user role
Route::middleware([AuthMiddleware::class . ':user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
