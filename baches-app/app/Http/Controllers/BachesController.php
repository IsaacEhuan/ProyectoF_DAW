<?php

namespace App\Http\Controllers;

use App\Http\Requests\ADeleteBache;
use App\Http\Requests\CreateBache;
use App\Http\Requests\DeleteBache;
use App\Http\Requests\ResueltoBache;
use App\Http\Requests\UpdateBache;
use App\Models\Bache;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Assert;


use function PHPUnit\Framework\isNull;

class BachesController extends Controller
{
    public function crearBache(){
        return view("baches.crearBache");
    }

    public function tablaBaches(){
        if(Auth::user()->admin){
            $baches = Bache::paginate(5);
            return view('baches.tablaBaches',['baches'=>$baches]);
        }
        return redirect()->back();
    }

    public  function usuarioBaches(){
        if(!Auth::check()){
            return view('inicio');
        }
        $usuario = Auth::user()->id;
        $baches = DB::select(" CALL `baches_usuario` ($usuario)");
        return view('baches.usuarioBaches', ['baches'=>$baches]);
        //return $baches;
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
        return redirect($request->atras);
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

    public function resolverBaches(ResueltoBache $arreglo){
        $resueltos  = $arreglo->resuelto;
        foreach($resueltos as $resuelto){
            DB::statement("CALL `bache_sol`($resuelto)");
        }
        return redirect(route('misBaches'));
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
        

        if($request->estado=='on'){
            $bache->estado = 1;
        }else{
            $bache->estado = 0;
        }
        $bache->update();
        return redirect($request->atras);
    }


    public function eliminarBache($id){
                
        if(Auth::check()){
            $bache = Bache::find($id);
            if(Auth::user()->admin){
                return view('baches.eliminarBache', ['bache'=>$bache]);
            }
            if(Auth::user()->id ==$bache->id_usuario){
                return view('baches.eliminarBache', ['bache'=>$bache]);
            }
            return redirect()->back();
            }else{
                return redirect()->back();
        }

    }

    public function deleteBache(DeleteBache $request){
        $bache = Bache::find($request->id);
        $bache->delete();
        return redirect($request->atras);
    }

    public function adminDeleteBaches(ADeleteBache $request){
        $resueltos  = $request->eliminar;
        foreach($resueltos as $id){
            DB::statement("CALL `bache_eliminar`($id)");
        }
        return redirect(route('tablaBaches'));
    }

    public function reporteBaches(){
        if(Auth::user()->admin){
            $baches = Bache::all();
            $tabla='<html><body>';
            $tabla.='<table>'.
            "<tr><th>ID</th>
            <th>ID Usuario</th>
            <th>Fecha Creacion</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Latitud</th>
            <th>Longitud</th></tr>";
            //$tabla.="<tr><td>id</td><td>descripcion</td><td>fecha creacion</td></tr>";
            foreach($baches as $bache){
                $tabla.="<tr><td>$bache->id</td>
                <td>$bache->id_usuario</td>
                <td>$bache->fecha_creacion</td>
                <td>$bache->descripcion</td>
                <td>$bache->estado</td>
                <td>$bache->latitud</td>
                <td>$bache->longitud</td></tr>";
            }
            $tabla.="</table>";
            $tabla.='</body></html>';

            header('Content-Type: application/force-download');
            header('Content-Disposition: attachment; filename="Reporte Baches.xls"');
            header('Content-Transfer-Encoding: binary');
            print $tabla;
        }

    }




}
