<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    Route::get('', [HomeController::class, 'homeIndex'])->name('home-page.index');
    Route::get('donasi', [HomeController::class, 'homeDonation'])->name('home-page.donasi');
    Route::get('pengajuan-bantuan', [HomeController::class, 'pengajuanBantuan'])->name('home-page.pengajuan-bantuan');
    Route::post('pengajuan-bantuan', [HomeController::class, 'pengajuanBantuanStore'])->name('home-page.pengajuan-bantuan.store');
    Route::get('donasi/{id}', [HomeController::class, 'homeDonationDetail'])->name('home-page.donasi.detail');
    Route::post('donasi/{id}', [HomeController::class, 'donasiSekarang'])->name('home-page.donasi.bantu');
});
