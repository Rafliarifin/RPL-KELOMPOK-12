<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminCarController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Middleware\AdminAuth;


// Menampilkan halaman home dari views/home.blade.php
Route::get('/', [HomeController::class, 'index'])->name('home');



// Route untuk controller CarController
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');


// Route untuk controller RentalController
Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index');
Route::get('/rentals/create', [RentalController::class, 'create'])->name('rentals.create');
Route::post('/rentals', [RentalController::class, 'calculatePrice'])->name('rentals.calculatePrice');
Route::get('/rentals/{rental}/edit', [RentalController::class, 'edit'])->name('rentals.edit');
Route::put('/rentals/{rental}', [RentalController::class, 'update'])->name('rentals.update');
Route::delete('/rentals/{rental}', [RentalController::class, 'destroy'])->name('rentals.destroy');

Route::middleware('admin.auth', AdminAuth::class);

// Login routes (tidak perlu middleware)
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin routes dengan middleware
Route::middleware([AdminAuth::class])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/cars', [AdminCarController::class, 'index'])->name('cars.index');
        Route::get('/cars/create', [AdminCarController::class, 'create'])->name('cars.create');
        Route::post('/cars', [AdminCarController::class, 'store'])->name('cars.store');
        Route::get('/cars/{car}/edit', [AdminCarController::class, 'edit'])->name('cars.edit');
        Route::put('/cars/{car}', [AdminCarController::class, 'update'])->name('cars.update');
        Route::delete('/cars/{car}', [AdminCarController::class, 'destroy'])->name('cars.destroy');
    });
});