<?php

use App\Http\Controllers\JenisBantuanController;
use App\Http\Controllers\MustahiqController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('pengajuan-bantuan')->group(function () {
    Route::get('{jenis}', [JenisBantuanController::class, 'index'])->name('pengajuan-bantuan.index');
    Route::get('detail/{jenis}/{id}', [JenisBantuanController::class, 'detail'])->name('pengajuan-bantuan.detail');
    Route::get('change-status/{jenis}/{id}/{status}', [JenisBantuanController::class, 'changeStatus'])->name('pengajuan-bantuan.changeStatus');
});
