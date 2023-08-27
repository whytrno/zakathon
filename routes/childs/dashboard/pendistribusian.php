<?php

use App\Http\Controllers\PendistribusianController;

use Illuminate\Support\Facades\Route;

Route::get('/', [PendistribusianController::class, 'index'])->name('pendistribusian.index');
Route::get('rekap', [PendistribusianController::class, 'rekap'])->name('pendistribusian.rekap');
Route::get('change-status/{id}/{type}', [PendistribusianController::class, 'changeStatus'])->name('pendistribusian.changeStatus');
Route::get('create', [PendistribusianController::class, 'create'])->name('pendistribusian.create');
Route::post('', [PendistribusianController::class, 'store'])->name('pendistribusian.store');
Route::get('edit/{id}', [PendistribusianController::class, 'edit'])->name('pendistribusian.edit');
Route::post('{id}', [PendistribusianController::class, 'update'])->name('pendistribusian.update');
Route::delete('{id}', [PendistribusianController::class, 'destroy'])->name('pendistribusian.delete');

Route::prefix('{pendistribusian_id}/detail')->group(function () {
    include_once 'pendistribusian-detail.php';
});
