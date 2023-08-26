<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('user')->group(function () {
        include_once "muzakki.php";
        include_once "mustahiq.php";
    });
    
    Route::prefix('pendistribusian')->group(function(){
        include_once "pendistribusian.php";
    });
});