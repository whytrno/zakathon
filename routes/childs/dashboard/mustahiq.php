<?php

use App\Http\Controllers\MustahiqController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('mustahiq')->group(function () {
    Route::get('', [MustahiqController::class, 'index'])->name('mustahiq.index');
    Route::get('create', [MustahiqController::class, 'create'])->name('mustahiq.create');
    Route::get('edit/{id}', [MustahiqController::class, 'edit'])->name('mustahiq.edit');
    Route::post('', [MustahiqController::class, 'store'])->name('mustahiq.store');
    Route::post('{id}', [MustahiqController::class, 'update'])->name('mustahiq.update');
    Route::delete('{id}', [MustahiqController::class, 'destroy'])->name('mustahiq.delete');

    Route::get('json/detail/{id}', [MustahiqController::class, 'detailJson']);
    Route::get('json/{query}', [MustahiqController::class, 'searchJson']);
});
