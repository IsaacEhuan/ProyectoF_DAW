<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class InicioController extends Controller
{
    public function __invoke(){
        if(Auth::check()){
            return redirect(route('casa'));
        }
        return view('inicio');
    }

    public function paginaPrincipal(){
        $baches = DB::table('pagina_principal')->orderBy('fecha_creacion','desc')->cursorPaginate(15);
        return view('casa', ['baches'=>$baches]);
    }


}
