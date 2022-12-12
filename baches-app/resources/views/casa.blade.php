<!DOCTYPE html>
@include('casaNavegador')

<div class="row">
  <div class="col-7">
    <div class="row" style="display:inline-flexbox">
      @foreach ($baches as $bache)
      <div class="col-sm-5">
        <div class="card">
          <div class="card-body">
            <img class="card-img-top" alt="Card image cap" src="http://localhost/ProyectoF_DAW/baches-app/public{{$bache->imagen}}" style="height:250px">
              <div class="card-body">
                <h2 class="card-title">{{$bache->nombre}}<h2>
                <h5>{{$bache->fecha_creacion}}</h5>
                @if($bache->estado==0)
                <h3 style="color: red;">Sin resolver</h3>
                @else 
                <h3 style="color:green">Resuelto</h3>   
                @endif
                <p class="card-text">{{$bache->descripcion}}</p>

                @if($bache->nombre == Auth::user()->nombre ||Auth::user()->admin)
                <a class="btn btn-primary" href="baches/editar/{{ $bache->id}}"> Modificar</a>
                @endif
              </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="fixed-bottom" style="display:flex; margin-left:650px; margin-bottom:50px">
    
    {{ $baches->links() }}
    <div sty id="mapaBaches" style="width: 400px; height:400px;" >
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
    