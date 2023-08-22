<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('home')->group(function () {
    Route::get('',[HomeController::class,'index'])->name('home.index');

});