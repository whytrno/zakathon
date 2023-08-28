<?php

use App\Http\Controllers\DonasiController;
use App\Http\Controllers\PendistribusianDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DonasiController::class, 'detail'])->name('donasi.detail.index');
