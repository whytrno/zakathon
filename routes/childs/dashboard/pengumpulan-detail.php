<?php

use App\Http\Controllers\PengumpulanDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PengumpulanDetailController::class, 'index'])->name('pengumpulan.detail.index');
Route::get('print/{id}', [PengumpulanDetailController::class, 'print'])->name('pengumpulan.detail.print');
Route::get('create', [PengumpulanDetailController::class, 'create'])->name('pengumpulan.detail.create');
Route::post('', [PengumpulanDetailController::class, 'store'])->name('pengumpulan.detail.store');
Route::get('edit/{id}', [PengumpulanDetailController::class, 'edit'])->name('pengumpulan.detail.edit');
Route::post('{id}', [PengumpulanDetailController::class, 'update'])->name('pengumpulan.detail.update');
Route::delete('{id}', [PengumpulanDetailController::class, 'destroy'])->name('pengumpulan.detail.delete');
