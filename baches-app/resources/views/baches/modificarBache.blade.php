<!DOCTYPE html>

@include('casaNavegador')
<div>
    <form action="{{route('modificarBache')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Editar Bache</h1>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id_usuario" value="{{$bache->id_usuario}}">
        <input type="hidden" name="id" value="{{$bache->id}}">


        <label for="imagen">Imagen Actual</label>
        <img src="{{$bache->imagen}}" style="width: 250px">

        <input type="hidden" name="atras" value="{{url()->previous()}}">
        
        <label for="imagen">Imgen Actual</label>
        <img src="http://localhost/ProyectoF_DAW/baches-app/public{{$bache->imagen}}" style="width: 250px">

        <input type="file" name="imagen" id="imagen" accept="image/*">
        @error('imagen')
            <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror
        <br>

        <label for="latitud">Latitud</label>
        <input name="latitud" id="lat" value="{{$bache->latitud}}">
        <br>
        @error('latitud')
        <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror

        <label for="longitud">Longitud</label>
        <input name="longitud" id="lng" value="{{$bache->longitud}}">
        <br>
        <div id="mapa" style="width:500px; height: 500px;"></div>
        @error('longitud')
        <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror
        <label for="estado">Resuelto</label>
        @if ($bache->estado)
          <input type="checkbox" name="estado" checked> 
        @else
          <input type="checkbox" name="estado"> 
        @endif
       


        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion">{{$bache->descripcion}}</textarea>
        <div>⚠️300 letras<div>
          @error('descripcion')
          <p class="alert alert-danger" role="alert">* {{$message}}</p>
          @enderror
        <br>
        <input type="submit" value="Aceptar">
        
    </form>
     
    <a href="{{ url()->previous() }}">Atras</a>
</div>


<script>

function inicarMapa() {
  const latitud = <?php  echo "$bache->latitud" ?>;
  const longitud = <?php  echo "$bache->longitud" ?>;
  const meridaCoordenadas = { lat: 20.9753700, lng:-89.6169600 };
  const mapa = new google.maps.Map(document.getElementById("mapa"), {
    zoom: 12,
    center: meridaCoordenadas,
  });
  const marcador = new google.maps.Marker({
    position: {lat: latitud, lng: longitud},
    draggable: true,
    map: mapa,
    title: "Ubicación",
  });
  marcador.addListener('dragend', function(evento){
    document.getElementById('lat').value = this.getPosition().lat();
    document.getElementById('lng').value = this.getPosition().lng();
  })
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=inicarMapa"></script>