<?php

use App\Http\Controllers\AdminController;
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
    return view('index');
});


Route::get("/login",[AdminController::class,"loginview"]);
Route::post("/login",[AdminController::class,"login"])->name('login');


Route::middleware("auth")->group(function () {
    Route::get("/home",[AdminController::class,"home"])->name('home');
    Route::get("/logout",[AdminController::class,"logout"])->name('logout');


    // Route::get("/home",[AdminController::class,"home"]);
});