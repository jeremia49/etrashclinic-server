<?php

use App\Http\Controllers\APIGeneralController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\SampahPenggunaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("/register",[AuthController::class,"register"]);
Route::post("/login",[AuthController::class,"login"]);
Route::post("/logout",[AuthController::class,"logout"])->middleware('auth:sanctum');
Route::post("/setFCMToken",[AuthController::class,"fcmToken"])->middleware('auth:sanctum');

Route::get("/me",[AuthController::class,"me"])->middleware('auth:sanctum');
Route::get("/notifications",[AuthController::class,"notifications"])->middleware('auth:sanctum');;

Route::get("/informasi",[APIGeneralController::class,"informasi"]);
Route::get("/artikel",[APIGeneralController::class,"artikel"]);
Route::get("/sampahunitprice",[APIGeneralController::class,"sampahunitprice"]);
Route::get("/produkhasil",[APIGeneralController::class,"produkhasil"]);


Route::post("/uploadImage",[SampahController::class,"storeImage"])->middleware('auth:sanctum');

Route::post("/addSampah",[SampahPenggunaController::class,"addSampahPengguna"])->middleware('auth:sanctum');
Route::get("/historySampah",[SampahPenggunaController::class,"historySampah"])->middleware('auth:sanctum');