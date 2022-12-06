<!DOCTYPE html>
@include('casaNavegador')
<div style="display: flexbox; flex-direction: column;">
    <div>
    @foreach ($baches as $bache)
    <div>
        <img src="{{$bache->imagen}}" style="height:250px">
        <div>{{$bache->fecha_creacion}}</div>
        <div>{{$bache->nombre}}</div>


        @if($bache->estado==0)
            <h3>Sin resolver</h3>
        @else 
            <h3>Resuelto</h3>   
        @endif

        <div>{{$bache->descripcion}}</div>

    </div>
    @endforeach
    </div>

    <div id="mapa" style="width: 500px; height:500px">
    </div>
</div>
<script>
    const baches = <?php  echo json_encode($baches) ?>;
    console.log(baches);

    function iniciarMapa() {
      const meridaCoordenadas = { lat: {{20.9753700}}, lng:-89.6169600 };
      const mapa = new google.maps.Map(document.getElementById("mapa"), {
        zoom: 12,
        center: meridaCoordenadas,
      });
      baches.forEach(bache => {
        var latitud= bache['latitud'];
        var longitud= bache['longitud'];
        const coordenadas = { lat:latitud, lng:longitud};
        const marcador = new google.maps.Marker({
            position: coordenadas,
            draggable: false,
            map: mapa,
            title: "Ubicación",
        });
      });
      const marcador = new google.maps.Marker({
        position: meridaCoordenadas,
        draggable: false,
        map: mapa,
        title: "Ubicación",
      });
    }
    
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script>
    