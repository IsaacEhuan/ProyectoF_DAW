<?php

use App\Http\Controllers\BachesController;
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


Route::get('/casa',[InicioController::class, 'paginaPrincipal'])->name('casa');



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





//***--Baches--***
Route::get('/baches',[ BachesController::class, 'tablaBaches']) ->name('tablaBaches');


Route::get('/baches/mios',[ BachesController::class, 'usuarioBaches']) ->name('misBaches');

Route::post('/baches/mios',[ BachesController::class, 'resolverBaches']) ->name('misBaches');



//Crear Bache

Route::get('/baches/crear', [ BachesController::class, 'crearBache'])->name('crearBache');

Route::post('/baches/crear',[ BachesController::class, 'createBache'])->name('crearBache');



//Editar Bache FAVOR DE NO TOCAR NADA DE ESTO, Que da problemas por alguna razon
Route::get('/baches/editar/{id}',[BachesController::class, 'editarBache'])->name('modificarBache');

Route::put('/baches/editar/',[BachesController::class, 'updateBache'])->name('modificarBache');


//Eliminar Bache
Route::get('/baches/eliminar/{id}', [BachesController::class, 'eliminarBache'])->name('eliminarBache');

Route::delete('/baches/eliminar/', [BachesController::class, 'deleteBache'])->name('eliminarBache');

Route::delete('/baches',[ BachesController::class, 'adminDeleteBaches']) ->name('tablaBaches');


//Descargar Archivo

Route::get('baches/descargar',[ BachesController::class, 'reporteBaches'] )->name('descargar');


Route::post('/baches/buscar',[BachesController::class, 'buscarBache'])->name('buscarBache');