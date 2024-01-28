<?php

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
    return view('login');
})->name("login");

Route::post("/login", [\App\Http\Controllers\AuthController::class, "store"])->name("login.store");
Route::post("/logout", [\App\Http\Controllers\AuthController::class, "logout"])->name("login.logout");

Route::middleware("auth")->get("/transaction", [\App\Http\Controllers\TransactionController::class, "index"]);
