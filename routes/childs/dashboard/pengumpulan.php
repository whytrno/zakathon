<?php

use App\Http\Controllers\PengumpulanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('', [PengumpulanController::class, 'index'])->name('pengumpulan.index');
Route::get('create', [PengumpulanController::class, 'create'])->name('pengumpulan.create');
Route::get('change-status/{id}/{type}', [PengumpulanController::class, 'changeStatus'])->name('pengumpulan.changeStatus');
Route::get('edit/{id}', [PengumpulanController::class, 'edit'])->name('pengumpulan.edit');
Route::post('', [PengumpulanController::class, 'store'])->name('pengumpulan.store');
Route::post('{id}', [PengumpulanController::class, 'update'])->name('pengumpulan.update');
Route::delete('{id}', [PengumpulanController::class, 'destroy'])->name('pengumpulan.delete');

Route::prefix('{pengumpulan_id}/detail')->group(function () {
    include_once 'pengumpulan-detail.php';
});
