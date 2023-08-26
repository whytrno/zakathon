<?php

use App\Http\Controllers\PendistribusianDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PendistribusianDetailController::class, 'index'])->name('pendistribusian.detail.index');
Route::get('create', [PendistribusianDetailController::class, 'create'])->name('pendistribusian.detail.create');
Route::post('', [PendistribusianDetailController::class, 'store'])->name('pendistribusian.detail.store');
Route::get('edit/{id}', [PendistribusianDetailController::class, 'edit'])->name('pendistribusian.detail.edit');
Route::post('{id}', [PendistribusianDetailController::class, 'update'])->name('pendistribusian.detail.update');
Route::delete('{id}', [PendistribusianDetailController::class, 'destroy'])->name('pendistribusian.detail.delete');