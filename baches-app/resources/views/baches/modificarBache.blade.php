<!DOCTYPE html>

@include('casaNavegador')
<div class="row">
  <div class="col-6">
    <form action="{{route('modificarBache')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 style="text-align:center; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Editar Bache</h1>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id_usuario" value="{{$bache->id_usuario}}">
        <input type="hidden" name="id" value="{{$bache->id}}">


        <input type="hidden" name="atras" value="{{url()->previous()}}">
        <div class="mb-3">
        <label for="imagen">Imagen Actual</label>
        <img src="http://localhost/ProyectoF_DAW/baches-app/public{{$bache->imagen}}" style="width: 250px">
        </div>

        <div class="mb-4">
        <input type="file" name="imagen" id="imagen" accept="image/*"  for="exampleFormControlFile1" class="form-control form-control-sm" id="formFileSm" style="width: 500px;">
        @error('imagen')
            <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror
        <br>
        </div>

        <label for="latitud" style="font-weight: 600;">Latitud</label>
        <input name="latitud" id="lat" value="{{$bache->latitud}}" class="form-control" type="text" readonly style="width: 250px;">
        <br>
        @error('latitud')
        <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror

        <label for="longitud" style="font-weight: 600">Longitud</label>
        <input name="longitud" id="lng" value="{{$bache->longitud}}" class="form-control" type="text" readonly style="width: 250px;">
        <br>
        
        <div class="mb-4">
        @error('longitud')
        <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror
        <label for="estado" style="font-size:x-large;">Resuelto</label>
        @if ($bache->estado)
          <input class="form-check-input" type="checkbox" name="estado" checked> 
        @else
          <input class="form-check-input" type="checkbox" name="estado"> 
        @endif
        </div>

        <div class="mb-4">
        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" class="form-control" id="textAreaExample" rows="3">{{$bache->descripcion}}</textarea>
        <h5 style="text-align: right;">⚠️300 letras<h5>
          @error('descripcion')
          <p class="alert alert-danger" role="alert">* {{$message}}</p>
          @enderror
        <br>
        </div>
        <input type="submit" value="Aceptar" class="btn btn-primary">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Atras</a>
    </form>
  </div>
  <div class="col">
    <div id="mapa" style="width:500px; height: 500px;"></div>
  </div>
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