@include('casaNavegador')
<div>
    <form method="POST" action="{{route('tablaBaches')}}">
    @csrf
    @method('DELETE')
    <input type="submit" value="Eliminar Baches">
    <a href="{{route('crearBache')}}">Crear Bache</a>
    <table border="1">
        <tr>
            <th>Eliminar</th>
            <th>ID</th>
            <th>ID Usuario</th>
            <th>Fecha Creacion</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Imagen</th>
            <th>Latitud</th>
            <th>Longitud</th>
            <th></th>
        </tr>
    @foreach ($baches as $bache)
    <tr>
        <td><input type="checkbox" name="eliminar[]" value="{{$bache->id}}"></td>
        <td>{{$bache->id}}</td>
        <td>{{$bache->id_usuario}}</td>
        <td>{{$bache->fecha_creacion}}</td>
        <td>{{$bache->descripcion}}</td>
        <td>
            @if($bache->estado==0)
            <h3>Sin resolver</h3>
        @else 
            <h3>Resuelto</h3>   
        @endif
        </td>
        <td><img src="http://localhost/ProyectoF_DAW/baches-app/public{{$bache->imagen}}" style="height:50px"></td>
        <td>{{$bache->latitud}}</td>
        <td>{{$bache->longitud}}</td>

        <!--Aqui poner alguna imagen en vez del texto -->
        <td> <a href="{{route("modificarBache")}}/{{$bache->id}}"> Modificar </a> |
        <a href="{{route("eliminarBache")}}/{{$bache->id}}"> Eliminar </a></td>

    </tr>
    @endforeach
    </table>
    <div>{!!$baches->links()!!}</div>
    <form>
    <div id="mapaBaches" style="width: 500px; height:500px">
    </div>
</div>

<!--Script para que funcione el mapa| NO TOCAR-->
<script>
    var baches = <?php  echo json_encode($baches) ?>;
    baches= baches["data"];
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
    