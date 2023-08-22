<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::get('/code-verification', [AuthController::class, 'codeVerification'])->name('code-verification');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('auth/login');
    })->name('logout');
});