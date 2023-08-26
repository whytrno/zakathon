<?php

use App\Http\Controllers\PengumpulanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('pengumpulan')->group(function () {
    Route::get('', [PengumpulanController::class, 'index'])->name('pengumpulan.index');
    Route::get('detail/{id}', [PengumpulanController::class, 'detail'])->name('pengumpulan.detail');
    Route::post('', [PengumpulanController::class, 'store'])->name('pengumpulan.store');
    Route::post('{id}', [PengumpulanController::class, 'update'])->name('pengumpulan.update');
    Route::delete('{id}', [PengumpulanController::class, 'destroy'])->name('pengumpulan.delete');
});
