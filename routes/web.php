<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\InformasiController;
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

    Route::get("/informasi",[InformasiController::class,"informasi"])->name('informasi');
    Route::get("/informasi/add",[InformasiController::class,"addinformasi"])->name('addinformasi');
    Route::post("/informasi/add",[InformasiController::class,"addinformasip"])->name('addinformasi.p');
    Route::get("/informasi/edit/{id}",[InformasiController::class,"editinformasi"])->name('editinformasi');
    Route::post("/informasi/edit/{id}",[InformasiController::class,"editinformasip"])->name('editinformasi.p');
    Route::get("/informasi/delete/{id}",[InformasiController::class,"deleteinformasi"])->name('deleteinformasi');
    Route::get("/informasi/view/{id}",[InformasiController::class,"viewinformasi"])->name('viewinformasi');

    Route::get("/artikel",[ArtikelController::class,"artikel"])->name('artikel');
    Route::get("/artikel/add",[ArtikelController::class,"addartikel"])->name('addartikel');
    Route::post("/artikel/add",[ArtikelController::class,"addartikelp"])->name('addartikel.p');
    Route::get("/artikel/edit/{id}",[ArtikelController::class,"editartikel"])->name('editartikel');
    Route::post("/artikel/edit/{id}",[ArtikelController::class,"editartikelp"])->name('editartikel.p');
    Route::get("/artikel/delete/{id}",[ArtikelController::class,"deleteartikel"])->name('deleteartikel');
    Route::get("/artikel/view/{id}",[ArtikelController::class,"viewartikel"])->name('viewartikel');

    

    // Route::get("/home",[AdminController::class,"home"]);
});