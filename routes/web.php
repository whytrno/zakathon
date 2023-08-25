<?php

use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => ['auth']], function () {
    include_once "childs/auth.php";
    include_once "childs/home.php";
    include_once "childs/dashboard/main.php";
});

Route::group(['middleware' => ['guest']], function () {
    include_once "childs/auth-not-login.php";
});
