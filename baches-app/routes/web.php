<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;

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

Route::get('/', InicioController::class)->name('inicio');

Route::get('/inicio',function(){
    return view('welcome');
});


//***--Usuarios--***

//Iniciar sesion-------

//Vista
Route::get("/iniciar-sesion", [UsuarioController::class,'iniciarSesion'])->name('iniciarSesion');

//Accion del formuario, lo hago así para que no parezca que el link cambie
Route::post("/iniciar-sesion", [UsuarioController::class,'autenticarUsuario'])->name('iniciarSesion');

Route::get("/salir", [UsuarioController::class,'salir'])->name('salir');
//Iniciar sesion-------


//Crear usuario
Route::get('/unirse',[UsuarioController::class,'crearUsuario'])->name('crearUsuario');

Route::post('/unirse',[UsuarioController::class,'createUsuario'])->name('crearUsuario');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
