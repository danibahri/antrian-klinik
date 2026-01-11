<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PoliController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\QueueController;


Route::get('/', function () {
    return view('pages.landing');
})->name('landing');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.post');

// Admin routes - requires admin role
Route::middleware([AuthMiddleware::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Profile routes
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');

    // User management routes
    Route::get('/users', [AdminController::class, 'users'])->name('users');

    // Patient management routes
    Route::get('/patients', [AdminController::class, 'patients'])->name('patients');
    Route::get('/patients/create', [AdminController::class, 'createPatient'])->name('patients.create');
    Route::post('/patients', [AdminController::class, 'storePatient'])->name('patients.store');
    Route::get('/patients/{patient}/edit', [AdminController::class, 'editPatient'])->name('patients.edit');
    Route::put('/patients/{patient}', [AdminController::class, 'updatePatient'])->name('patients.update');
    Route::delete('/patients/{patient}', [AdminController::class, 'destroyPatient'])->name('patients.destroy');

    // Doctor management routes
    Route::get('/doctors', [DokterController::class, 'doctors'])->name('doctors');
    Route::get('/doctors/create', [DokterController::class, 'create'])->name('doctors.create');
    Route::post('/doctors', [DokterController::class, 'store'])->name('doctors.store');
    Route::get('/doctors/{doctor}/edit', [DokterController::class, 'edit'])->name('doctors.edit');
    Route::put('/doctors/{doctor}', [DokterController::class, 'update'])->name('doctors.update');
    Route::delete('/doctors/{doctor}', [DokterController::class, 'destroy'])->name('doctors.destroy');

    // Poli management routes
    Route::get('/polis', [PoliController::class, 'polis'])->name('polis');
    Route::get('/polis/create', [PoliController::class, 'create'])->name('polis.create');
    Route::post('/polis', [PoliController::class, 'store'])->name('polis.store');
    Route::get('/polis/{poli}/edit', [PoliController::class, 'edit'])->name('polis.edit');
    Route::put('/polis/{poli}', [PoliController::class, 'update'])->name('polis.update');
    Route::delete('/polis/{poli}', [PoliController::class, 'destroy'])->name('polis.destroy');

    // Queue management routes
    Route::get('/queues', [QueueController::class, 'queues'])->name('queues');
    Route::post('/queues/{queue}/call', [QueueController::class, 'callQueue'])->name('queues.call');
    Route::post('/queues/{queue}/complete', [QueueController::class, 'completeQueue'])->name('queues.complete');
    Route::post('/queues/{queue}/cancel', [QueueController::class, 'cancelQueue'])->name('queues.cancel');
    Route::post('/queues/call-next', [QueueController::class, 'callNextQueue'])->name('queues.call-next');
});

// User routes - requires user role
Route::middleware([AuthMiddleware::class . ':user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // Profile routes
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

    // Queue routes
    Route::get('/queues', [UserController::class, 'allQueues'])->name('queues');
    Route::post('/queues', [UserController::class, 'storeQueue'])->name('queues.store');
    Route::post('/queues/{queue}/cancel', [UserController::class, 'cancelQueue'])->name('queues.cancel');

    // API routes for dynamic data
    Route::get('/api/polis/{poli}/doctors', [UserController::class, 'getDoctorsByPoli'])->name('api.doctors');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
