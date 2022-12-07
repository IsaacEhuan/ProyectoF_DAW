<!DOCTYPE html>
@include('casaNavegador')
<div>
    <div>
    @foreach ($baches as $bache)
    <div style="border: 1px black dotted; width:300px">
        <img src="http://localhost/ProyectoF_DAW/baches-app/public{{$bache->imagen}}" style="height:250px">
        <div>{{$bache->fecha_creacion}}</div>
        <div>{{$bache->nombre}}</div>


        @if($bache->estado==0)
            <h3>Sin resolver</h3>
        @else 
            <h3>Resuelto</h3>   
        @endif

        @if($bache->nombre == Auth::user()->nombre ||Auth::user()->admin)
        <a href="baches/editar/{{ $bache->id}}"> Modificar</a>
        @endif



        <div>{{$bache->descripcion}}</div>

    </div>
    @endforeach

    {{ $baches->links() }}
    </div>

    <div id="mapaBaches" style="width: 500px; height:500px">
    </div>
</div>

<!--Script para que funcione el mapa| NO TOCAR-->
<script>
    var baches = <?php  echo json_encode($baches) ?>;
    baches = baches['data'];

    function iniciarMapaB() {
      const meridaCoordenadas = { lat: {{20.9753700}}, lng:-89.6169600 };
      const mapaB = new google.maps.Map(document.getElementById("mapaBaches"), {
        zoom: 12,
        center: meridaCoordenadas,
      });
      baches.forEach(bache => {
        var latitud= bache['latitud'];
        var longitud= bache['longitud'];
        const coordenadas = { lat:latitud, lng:longitud};
        const marcadorB = new google.maps.Marker({
            position: coordenadas,
            draggable: false,
            map: mapaB,
            title: "Ubicación",
        });
      });
    }
    
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapaB"></script>
    