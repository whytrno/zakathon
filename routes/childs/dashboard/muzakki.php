<?php

use App\Http\Controllers\MuzakkiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('muzakki')->group(function () {
    Route::get('', [MuzakkiController::class, 'index'])->name('muzakki.index');
    Route::get('create', [MuzakkiController::class, 'create'])->name('muzakki.create');
    Route::get('edit/{id}', [MuzakkiController::class, 'edit'])->name('muzakki.edit');
    Route::post('', [MuzakkiController::class, 'store'])->name('muzakki.store');
    Route::post('{id}', [MuzakkiController::class, 'update'])->name('muzakki.update');
    Route::delete('{id}', [MuzakkiController::class, 'destroy'])->name('muzakki.delete');

    Route::get('json/detail/{id}', [MuzakkiController::class, 'detailJson']);
    Route::get('json/{query}', [MuzakkiController::class, 'searchJson']);
});
