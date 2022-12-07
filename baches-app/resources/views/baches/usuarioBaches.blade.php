@include('casaNavegador')
<div>
    <form method="POST" action="{{route('misBaches')}}">
    @csrf
    <div>
    @foreach ($baches as $bache)
    <div style="border: 1px black dotted; width:300px">
        <img src="{{$bache->imagen}}" style="height:250px">
        <div>{{$bache->fecha_creacion}}</div>

        @if($bache->estado==0)
            <h3>Sin resolver</h3>
            <input type="checkbox" name="resuelto[]" value="{{$bache->id}}"> Resuelto
            <input type="submit" value="Aceptar">
        @else 
            <h3>Resuelto</h3>   
        @endif
        <a href="{{route("modificarBache")}}/{{$bache->id}}"> Modificar</a>
        <div>{{$bache->descripcion}}</div>

    </div>
    @endforeach
    </div>
    <form>
    <div id="mapaBaches" style="width: 500px; height:500px">
    </div>
</div>

<!--Script para que funcione el mapa| NO TOCAR-->
<script>
    const baches = <?php  echo json_encode($baches) ?>;
    console.log(baches);

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
    