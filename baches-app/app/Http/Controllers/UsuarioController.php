<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutenticarUsuario;
use App\Http\Requests\CreateUsuario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function iniciarSesion(){
        if(Auth::guest()){
            return view('usuarios.iniciarSesion');
        }else{
            return view('inicio');
        }
    }

    //Para autenticar se necesitan hacer algunos cambios
    //        -- App\Http\Controllers\AutenticarUsuario
    // cambiar proyecto\vendor\laravel\framework\src\Illuminate\Auth\Authenticatable.php
    //De otro modo no se autenticara a nadie
    /*
     public function getAuthPassword()
    {
        return $this->contrasena;
    }
    */
    public function autenticarUsuario(AutenticarUsuario $request){
        $credenciales = array();
        $credenciales["email"] =$request->email;
        $credenciales["password"] =$request->contrasena;
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            
            return "<h1>Autenticado</h1>";
        }
        $resultado = Auth::attempt($credenciales);
        return "<h1>Algo salio mal</h1>";
    }



    public function crearUsuario(){
        if(Auth::check()){
            return view('inicio');
        }else{
            return view('usuarios.crearUsuario');
        }
    }

    public function createUsuario(CreateUsuario $request){
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->contrasena = $request->contrasena;
        $usuario->email = $request->email;
        $usuario->save();


        $credenciales = array();
        $credenciales["email"] =$request->email;
        $credenciales["password"] =$request->contrasena;
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            return "<h1>Autenticado</h1>";
        }
        return "<h1>Algo salio mal</h1>";
    }


    public function salir(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }
}