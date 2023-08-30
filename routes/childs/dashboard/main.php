<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/peta', [DashboardController::class, 'petaPendistribusian'])->name('dashboard.peta');

    Route::prefix('user')->group(function () {
        include_once "muzakki.php";
        include_once "mustahiq.php";
    });

    Route::prefix('pendistribusian')->group(function () {
        include_once "pendistribusian.php";
    });
    Route::prefix('pengumpulan')->group(function () {
        include_once "pengumpulan.php";
    });
    Route::prefix('donasi')->group(function () {
        include_once "donasi.php";
    });

    Route::get('kabupaten/{query}', [DashboardController::class, 'getKabupatenJson']);

    include_once "pengajuan-bantuan.php";
    include_once "rekap.php";
});
