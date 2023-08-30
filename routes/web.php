<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
include_once "home.php";

Route::group(['middleware' => ['auth']], function () {
    include_once "childs/auth.php";
    include_once "childs/home.php";
//    Route::group(['middleware' => ['admin']], function () {
//        include_once "childs/dashboard/main.php";
//    });
    include_once "childs/dashboard/main.php";
});
Route::get('/midtrans-callback/{snapToken}', [HomeController::class, 'midtransCallbackWebview'])->name('midtrans-callback');

Route::group(['middleware' => ['guest']], function () {
    include_once "childs/auth-not-login.php";
});
