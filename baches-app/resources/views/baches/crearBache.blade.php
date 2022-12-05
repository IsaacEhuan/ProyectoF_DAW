<!DOCTYPE html>


<div>
    <form action="{{route('crearBache')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Reportar Bache</h1>
        
        <label for="imagen">Foto del Bache</label>
        <input type="file" name="imagen" id="imagen" accept="image/*">
        @error('imagen')
            <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror
        <br>

        <label for="latitud">Latitud</label>
        <input name="latitud" id="lat" value="20.9753700">
        <br>
        @error('latitud')
        <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror

        <label for="longitud">Longitud</label>
        <input name="longitud" id="lng" value="-89.6169600">
        <br>
        <div id="mapa" style="width:500px; height: 500px;"></div>
        @error('longitud')
        <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror


        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion"></textarea>
        <div>⚠️300 letras<div>
          @error('descripcion')
          <p class="alert alert-danger" role="alert">* {{$message}}</p>
          @enderror
        <br>
        <input type="submit" value="Aceptar">
    </form>
    
</div>


<script>

function inicarMapa() {
  const meridaCoordenadas = { lat: 20.9753700, lng:-89.6169600 };
  const mapa = new google.maps.Map(document.getElementById("mapa"), {
    zoom: 12,
    center: meridaCoordenadas,
  });
  const marcador = new google.maps.Marker({
    position: meridaCoordenadas,
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

