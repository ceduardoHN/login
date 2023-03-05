<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name("login.welcome");

Route::get("/",[LoginController::class,"index"])->name("login.index");
Route::get("/create",[LoginController::class,"create"])->name("login.create");
Route::post("/store",[LoginController::class,"store"])->name("login.store");
Route::get("/editar/{id}",[LoginController::class,"edit"])->name("login.edit");
Route::put("/update/{id}",[LoginController::class,"update"])->name("login.update");
Route::get("/destroy/{id}",[LoginController::class,"destroy"])->name("login.destroy");
