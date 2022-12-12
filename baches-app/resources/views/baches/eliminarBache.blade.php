<!DOCTYPE html>

@include('casaNavegador')
<div class="row">
  <div class="col" style="text-align: center; margin-left:120px" >
    <form action="{{route('eliminarBache')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <div class="col-sm-8" >
          <div class="card shadow-lg p-3 mb-5 bg-body rounded">
          <div class="card-body " style="height:auto; ">
        <h1 style="text-align:center; font-weight: 700; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">¿Estas seguro que quires eliminar el bache?</h1>
            <img class="card-img-top" alt="Card image cap" src="http://localhost/ProyectoF_DAW/baches-app/public{{$bache->imagen}}" style="height:250px">
            <div class="card-body ">
            <h2 class="card-title">{{$bache->fecha_creacion}}</h2>
    
            @if($bache->estado==0)
                <h3 style="color:red">Sin resolver</h3>
            @else 
                <h3 style="color:green">Resuelto</h3>   
            @endif
            <h5>{{$bache->descripcion}}</h5>
            <a href="{{route("modificarBache")}}/{{$bache->id}}" class="btn btn-warning"> Modificar</a>
            
        
        <input type="hidden" name=id value="{{$bache->id}}">
        <input type="hidden" name=id_usuario value="{{$bache->id_usuario}}">
        <input type="hidden" name=atras value="{{url()->previous()}}">
        <input type="submit" value="Aceptar" class="btn btn-primary">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Atras</a>
    </form>
    </div>
    </div>
    </div>
</div>
  </div>
  <div class="col">
    <div id="mapa" style="width: 500px; height:500px">
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