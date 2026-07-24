<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarqueController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/cars', [AdminCarController::class, 'index'])->name('admin.cars.index');
    Route::get('/cars/create', [AdminCarController::class, 'create'])->name('admin.cars.create');
    Route::post('/cars', [AdminCarController::class, 'store'])->name('admin.cars.store');
    Route::get('/cars/{car}/edit', [AdminCarController::class, 'edit'])->name('admin.cars.edit');
    Route::put('/cars/{car}', [AdminCarController::class, 'update'])->name('admin.cars.update');
    Route::delete('/cars/{car}', [AdminCarController::class, 'destroy'])->name('admin.cars.destroy');
    Route::get('/marques', [MarqueController::class, 'index'])->name('admin.marques.index');
    Route::get('/marques/create', [MarqueController::class, 'create'])->name('admin.marques.create');
    Route::post('/marques', [MarqueController::class, 'store'])->name('admin.marques.store');
    Route::get('/marques/{id}/edit', [MarqueController::class, 'edit'])->name('admin.marques.edit');
    Route::put('/marques/{id}', [MarqueController::class, 'update'])->name('admin.marques.update');
    Route::delete('/marques/{id}', [MarqueController::class, 'destroy'])->name('admin.marques.destroy');
});

Route::get('/', function () {
    return redirect()->route('login');
});
