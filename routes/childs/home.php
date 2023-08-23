<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('home')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home.index');
    Route::get('history', [HomeController::class, 'history'])->name('home.history');
    Route::get('profile', [HomeController::class, 'profile'])->name('home.profile');
    Route::get('edit-profile', [HomeController::class, 'editProfile'])->name('home.edit-profile');
    Route::post('edit-profile', [HomeController::class, 'updateProfile'])->name('home.update-profile');
});
