<!DOCTYPE html>

@include('casaNavegador')
<div>
    <form action="{{route('eliminarBache')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <h1>Estas seguro que quires eliminar el bache?</h1>
        <div style="border: 1px black dotted; width:300px">
            <img src="http://localhost/ProyectoF_DAW/baches-app/public{{$bache->imagen}}" style="height:250px">
            <div>{{$bache->fecha_creacion}}</div>
    
            @if($bache->estado==0)
                <h3>Sin resolver</h3>
            @else 
                <h3>Resuelto</h3>   
            @endif
            <a href="{{route("modificarBache")}}/{{$bache->id}}"> Modificar</a>
            <div>{{$bache->descripcion}}</div>
        </div>
        <input type="hidden" name=id value="{{$bache->id}}">
        <input type="hidden" name=id_usuario value="{{$bache->id_usuario}}">
        <input type="hidden" name=atras value="{{url()->previous()}}">
        <input type="submit" value="Aceptar">
        <a href="{{ url()->previous() }}">Atras</a>
    </form>
    
</div>
<div id="mapa" style="width: 500px; height:500px">


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