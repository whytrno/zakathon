<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('rekap')->group(function () {
    Route::get('{jenis}/{bulan}/{tahun}', [DashboardController::class, 'rekap'])->name('rekap');
});
