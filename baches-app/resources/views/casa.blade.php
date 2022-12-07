<!DOCTYPE html>
@include('casaNavegador')
<div>
  <div class="row">
    <div class="col-6">
      <div class="table-wrapper-scroll-y my-custom-scrollbar">
<table class="table table-bordered table-striped mb-0">
  <thead>
    <tr>
      <th scope="col" style="background-color:#FCF3CF ;">Usuario</th>
      <th scope="col" style="background-color:#FCF3CF ;">Imagen</th>
      <th scope="col" style="background-color:#FCF3CF ;">Fecha</th>
      <th scope="col" style="background-color:#FCF3CF ;" >Status</th>
      <th scope="col" style="background-color:#FCF3CF ;">Descripcion</th>
      <th scope="col" style="background-color:#FCF3CF ;">Modificar</th>
    </tr>
  </thead>
  <tbody>
        @foreach ($baches as $bache)
        <tr>
          <td style="background-color: #E8F6F3;">
            <div>{{$bache->nombre}}</div>
          </td>
          <td style="background-color: #E8F6F3;"><img src="{{$bache->imagen}}" style="height:250px"></td>
          <td style="background-color: #E8F6F3;">
            <div>{{$bache->fecha_creacion}}</div>
          </td>
          <td style="background-color: #E8F6F3;">
            @if($bache->estado==0)
            <h3>Sin resolver</h3>
            @else
            <h3>Resuelto</h3>
            @endif
          </td>
          <td style="background-color: #E8F6F3;">
            <div>{{$bache->descripcion}}</div>
          </td>
          <td style="background-color: #E8F6F3;">@if($bache->nombre == Auth::user()->nombre ||Auth::user()->admin)
            <a href="{{route('modificarBache', $bache->id)}}" style="text-decoration:none; color:#2874A6"> Modificar</a>
            @endif
          </td>
        </tr>
        @endforeach
        <tbody>
</table>
</div>
    </div>
    <div class="col-5">
    <div id="mapaBaches" style="width: 400px; height:500px">
    </div>
    </div>
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
    <style>
      .my-custom-scrollbar {
        position: relative;
        height: 600px;
        overflow: auto;
      }
      .table-wrapper-scroll-y {
        display: block;
      }
    </style>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapaB"></script>
    