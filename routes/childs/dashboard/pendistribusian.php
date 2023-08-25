<?php

use App\Http\Controllers\PendistribusianController;

use Illuminate\Support\Facades\Route;

    Route::get('/', [PendistribusianController::class, 'index'])->name('pendistribusian.index');