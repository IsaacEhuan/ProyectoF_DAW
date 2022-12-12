@include('casaNavegador')

<div>
<a class="btn btn-success" href="{{route('descargar')}}">Descargar Reporte</a>
    
    <a class="btn btn-primary" href="{{route('crearBache')}}">Agregar Bache</a>
    <button class="btn btn-danger" onclick="document.getElementById('form').submit()";"value="Eliminar Baches">Eliminar Baches</button>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <form method="POST" action="{{route('tablaBaches')}}"id="form">
    @csrf
    @method('DELETE')
    <p></p>
    <table class="table table-bordered table-striped mb-0" >
        <thead class="table-secondary">
        <tr class="d-flex">
            <th class="col-2">Eliminar</th>
            <th class="col-2">ID</th>
            <th class="col-2">ID Usuario</th>
            <th class="col-2">Fecha Creacion</th>
            <th class="col-2">Descripcion</th>
            <th class="col-2">Estado</th>
            <th class="col-2">Imagen</th>
            <th class="col-2">Latitud</th>
            <th class="col-2">Longitud</th>
            <th class="col-2"></th>
        </tr>
        </thead>
    @foreach ($baches as $bache)
    <tbody class="table-info">
        <tr class="d-flex">
        <td class="col-2"><input type="checkbox" name="eliminar[]" value="{{$bache->id}}"></td>
        <td class="col-2">{{$bache->id}}</td>
        <td class="col-2">{{$bache->id_usuario}}</td>
        <td class="col-2">{{$bache->fecha_creacion}}</td>
        <td class="col-2">{{$bache->descripcion}}</td>
        <td class="col-2">
            @if($bache->estado==0)
            <h3 style="color: red;">Sin resolver</h3>
        @else 
            <h3 style="color:green">Resuelto</h3>   
        @endif
        </td >
        <td class="col-2"><img src="http://localhost/ProyectoF_DAW/baches-app/public{{$bache->imagen}}" style="height:50px"></td>
        <td class="col-2">{{$bache->latitud}}</td>
        <td class="col-2">{{$bache->longitud}}</td>

        <!--Aqui poner alguna imagen en vez del texto -->
        <td class="col-2"> <a class="btn btn-primary" href="{{route("modificarBache")}}/{{$bache->id}}"> Modificar </a> |
        <a class="btn btn-danger" href="{{route("eliminarBache")}}/{{$bache->id}}"> Eliminar </a></td>
        </tr>
    </tbody>
    @endforeach
    </table>
    <div>{!!$baches->links()!!}</div>
</form>

    </div>
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

    <style>
        .my-custom-scrollbar {
            position: relative;
            height: 350px;
            overflow: auto;
            margin-right: 20px;
            margin-left: 20px;
        }
    .table-wrapper-scroll-y {
        display: block;
    }
    </style>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapaB"></script>
    