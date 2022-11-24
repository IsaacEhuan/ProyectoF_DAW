<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', HomeController::class)->name('inicio');

Route::view('Us','Us')->name('nosotros');

Route::view('Admin','Admin')->name('admin');

Route::view('CrearCuenta','CrearCuenta')->name('crearCuenta');

Route::view('InicioConLog','InicioConLog')->name('inicioConLog');

Route::view('/prueba', 'prueba');