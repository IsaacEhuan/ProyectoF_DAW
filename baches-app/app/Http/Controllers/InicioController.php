<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class InicioController extends Controller
{
    public function __invoke(){
        return view('inicio');
    }

    public function paginaPrincipal(){
        $baches = DB::select('SELECT * FROM `pagina_principal` ');
        return view('casa', ['baches'=>$baches]);
    }
}
