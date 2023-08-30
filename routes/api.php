<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
    include_once 'childApis/auth.php';
    include_once 'childApis/pengumpulan.php';
});

Route::post('/midtrans-callback', [HomeController::class, 'midtransCallback']);

include_once 'childApis/auth_not_login.php';
