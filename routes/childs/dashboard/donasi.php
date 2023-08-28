<?php

use App\Http\Controllers\DonasiController;
use App\Http\Controllers\PengumpulanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('', [DonasiController::class, 'index'])->name('donasi.index');
Route::get('create', [DonasiController::class, 'create'])->name('donasi.create');
Route::get('change-status/{id}/{type}', [DonasiController::class, 'changeStatus'])->name('donasi.changeStatus');
Route::get('edit/{id}', [DonasiController::class, 'edit'])->name('donasi.edit');
Route::post('', [DonasiController::class, 'store'])->name('donasi.store');
Route::post('{id}', [DonasiController::class, 'update'])->name('donasi.update');
Route::delete('{id}', [DonasiController::class, 'destroy'])->name('donasi.delete');
Route::get('rekap', [DonasiController::class, 'rekap'])->name('donasi.rekap');

Route::prefix('{donasi_id}/detail')->group(function () {
    include_once 'donasi-detail.php';
});
