<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\ProdukHasilController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\UserListController;
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

Route::get("/qr/scan/{id}", [QRCodeController::class,"scanqrcode"])->name('scanqrcode');
Route::get("/viewartikel/{id}",[ArtikelController::class,"viewartikel"])->name('viewartikelpublic');
Route::get("/viewinformasi/{id}",[InformasiController::class,"viewinformasi"])->name('viewinformasipublic');

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

    Route::get("/qrcode",[QRCodeController::class,"qrcode"])->name('qrcode');
    Route::get("/qrcode/add",[QRCodeController::class,"addqrcode"])->name('addqrcode');
    Route::post("/qrcode/add",[QRCodeController::class,"addqrcodep"])->name('addqrcode.p');
    Route::get("/qrcode/edit/{id}",[QRCodeController::class,"editqrcode"])->name('editqrcode');
    Route::post("/qrcode/edit/{id}",[QRCodeController::class,"editqrcodep"])->name('editqrcode.p');
    Route::get("/qrcode/delete/{id}",[QRCodeController::class,"deleteqrcode"])->name('deleteqrcode');
    Route::get("/qrcode/view/{id}",[QRCodeController::class,"viewqrcode"])->name('viewqrcode');

    Route::get("/qrlog",[QRCodeController::class,"qrlog"])->name('qrlog');
    
    Route::get("/sampah",[SampahController::class,"sampah"])->name('sampah');
    Route::get("/sampah/add",[SampahController::class,"addsampah"])->name('addsampah');
    Route::post("/sampah/add",[SampahController::class,"addsampahp"])->name('addsampah.p');
    Route::get("/sampah/edit/{id}",[SampahController::class,"editsampah"])->name('editsampah');
    Route::post("/sampah/edit/{id}",[SampahController::class,"editsampahp"])->name('editsampah.p');
    Route::get("/sampah/delete/{id}",[SampahController::class,"deletesampah"])->name('deletesampah');
    
    Route::get("/produkhasil",[ProdukHasilController::class,"produkhasil"])->name('produkhasil');
    Route::get("/produkhasil/add",[ProdukHasilController::class,"addprodukhasil"])->name('addprodukhasil');
    Route::post("/produkhasil/add",[ProdukHasilController::class,"addprodukhasilp"])->name('addprodukhasil.p');
    Route::get("/produkhasil/edit/{id}",[ProdukHasilController::class,"editprodukhasil"])->name('editprodukhasil');
    Route::post("/produkhasil/edit/{id}",[ProdukHasilController::class,"editprodukhasilp"])->name('editprodukhasil.p');
    Route::get("/produkhasil/delete/{id}",[ProdukHasilController::class,"deleteprodukhasil"])->name('deleteprodukhasil');


    Route::get("/pengguna",[UserListController::class,"pengguna"])->name('pengguna');

    // Route::get("/produkhasil/delete/{id}",[ProdukHasilController::class,"deleteprodukhasil"])->name('deleteprodukhasil');


    // Route::get("/home",[AdminController::class,"home"]);
});