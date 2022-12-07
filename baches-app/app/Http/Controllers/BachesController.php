<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBache;
use App\Http\Requests\UpdateBache;
use App\Models\Bache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

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
        return Redirect::to($request->request->get('http_referrer'));
    }

    public function editarBache($id){
        
        if(Auth::check()){
        $bache = Bache::find($id);
        if(Auth::user()->admin){
            return view('baches.modificarBache', ['bache'=>$bache]);
        }
        if(Auth::user()->id ==$bache->id_usuario){
            return view('baches.modificarBache', ['bache'=>$bache]);
        }
        return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }

    public function updateBache(UpdateBache $request){
        $bache = Bache::find($request->id);

        if(!isNull($request->file('imagen'))){
            $imagen = $request->file('imagen')->store('public/imagenes');
            $url_imagen = Storage::url($imagen);
            $bache->imagen = $url_imagen;
        }
       
        $bache->latitud = $request->latitud;
        $bache->longitud = $request->longitud;
        $bache->descripcion = $request->descripcion;
        
        $bache->update();
        return Redirect::to($request->request->get('http_referrer'));
    }
}
