<!DOCTYPE html>
@include('casaNavegador');


  <div class="row">
    <div class="col-6">
      <form action="{{route('crearBache')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
        <h1 style="text-align: center;">Reportar Bache</h1>
        </div>


        <div class="mb-3">
        <label for="latitud" style="padding-left:50px;">Latitud</label>
        <input name="latitud" id="lat" value="20.9753700" class="form-control" type="text" readonly style="width: 250px;">
        <br>
        </div>
        @error('latitud')
        <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror

        <label for="longitud" style="padding-left:50px;">Longitud</label>
        <input name="longitud" id="lng" value="-89.6169600" class="form-control" type="text" readonly style="width: 250px;">
        <br>

        <div class="mb-3">
        <label for="formFileSm" class="form-label" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">CARGAR FOTO DEL BACHE</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" for="exampleFormControlFile1" class="form-control form-control-sm" id="formFileSm" >
        @error('imagen')
            <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror
        <br>
        </div>
        

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" class="form-control" id="textAreaExample" rows="3"></textarea>
        <h5 style="text-align: right;">⚠️300 letras<h5>
          @error('descripcion')
          <p class="alert alert-danger" role="alert">* {{$message}}</p>
          @enderror
        <br>
        <input type="submit" class="btn btn-primary btn-lg btn-rounded float-end">
        <input type="hidden" name="atras" value="{{url()->previous()}}">
      </form>
    </div>
      
      <div class="col-4">
    <div id="mapa" style="width:500px; height: 500px;"></div>
        @error('longitud')
        <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror
    </div>
    
      </div>
    </div>
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

