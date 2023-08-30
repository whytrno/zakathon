<?php

use App\Http\Controllers\Api\PengumpulanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('pengumpulan')->group(function () {
    Route::get('', [PengumpulanController::class, 'index']);
    Route::post('bayar', [PengumpulanController::class, 'bayar']);
});
