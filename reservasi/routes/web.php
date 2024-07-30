<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BokingController;
use App\Http\Controllers\BokingDetailController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\StatuspesananController;
use Illuminate\Support\Facades\Route;

// Define the dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Define the routes that require authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin', [DashboardController::class, 'tampil_admin'])->name('layout.app');

    // Teams
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/{id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('/teams/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');

    // Catalogs
    Route::get('/catalogs/create', [CatalogController::class, 'create'])->name('catalogs.create');
    Route::post('/catalogs', [CatalogController::class, 'store'])->name('catalogs.store');
    Route::get('/catalogs', [CatalogController::class, 'index'])->name('catalogs.index');
    Route::get('/catalogs/{id}/edit', [CatalogController::class, 'edit'])->name('catalogs.edit');
    Route::put('/catalogs/{id}', [CatalogController::class, 'update'])->name('catalogs.update');
    Route::delete('/catalogs/{id}', [CatalogController::class, 'destroy'])->name('catalogs.destroy');

    // Boking
    Route::get('/pesanan/tampil', [BokingController::class, 'tampil'])->name('boking.tampil');
    Route::get('/pesanan/selesai', [BokingController::class, 'selesai'])->name('boking.selesai');
    Route::post('/pesanan/{id}/update-status', [BokingController::class, 'updateStatus'])->name('boking.updateStatus');
});

// Define the home route
Route::get('/', [HomeController::class, 'index']);

// Define the pemesanan route
Route::get('/pemesanan', [PemesananController::class, 'view'])->name('pemesanan.pemesanan');

// Define the boking routes
Route::get('/boking/{id}', [BokingController::class, 'index'])->name('boking.index');
Route::post('/boking/pesan/{id}', [BokingController::class, 'pesan'])->name('boking.pesan');

// Include the authentication routes
require __DIR__.'/auth.php';
