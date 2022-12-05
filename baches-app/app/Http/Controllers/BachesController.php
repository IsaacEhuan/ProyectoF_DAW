<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBache;
use App\Models\Bache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BachesController extends Controller
{
    public function crearBache(){
        return view("baches.crearBache");
    }


    //Ejecutar:
    // php artisan storage:link para que se guarden bien las imagenes
    public function createBache(CreateBache $request){
        $imagen = $request->file('imagen')->store('public/imagenes');

        $url_imagen = Storage::url($imagen);
        $bache = new Bache();
        $bache->id_usuario = Auth::user()->id;
        $bache->latitud = $request->latitud;
        $bache->longitud = $request->longitud;
        $bache->descripcion = $request->descripcion;
        $bache->imagen = $url_imagen;
        $bache->fecha_creacion = date('Y-m-d H:i:s');
        $bache->save();
        return redirect(route('casa'));
    }
}
