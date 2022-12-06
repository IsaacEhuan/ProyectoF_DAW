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
        $baches = DB::select('SELECT * FROM `pagina_principal` ');
        return view('casa', ['baches'=>$baches]);
    }
}
