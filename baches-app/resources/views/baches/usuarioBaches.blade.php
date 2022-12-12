@include('casaNavegador')
<div id="content">
  <div class="row">
    <marquee behavior="alternate" direction="right" lopp="" style="color:purple; font-weight:700; font-size:larger">¡TUS BACHES!</marquee>
  </div>
  <div class="row">
    <div class="col-7">
      <form method="POST " action="{{route('misBaches')}}">
        @csrf
          <div class="row" style="display:inline-flexbox">
            @foreach ($baches as $bache)
              <div class="col-sm-5 ">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                  <div class="card-body" style="height:auto;;">
                    <img class="card-img-top" alt="Card image cap" src="http://localhost/ProyectoF_DAW/baches-app/public{{$bache->imagen}}" style="height:250px">
                      <div class="card-body ">
                        <h2 class="card-title">{{$bache->fecha_creacion}}</h2>
                          <h5>Descripción: {{$bache->descripcion}}</h5>
                            @if($bache->estado==0)
                            <h3 style="color:red;">Sin resolver</h3>
                              <div class="form-check">
                                <input style="display: inline-flexbox;" class="form-check-input" id="flexCheckDefault" type="checkbox" name="resuelto[]" value="{{$bache->id}}">
                                 <label class="form-check-label" for="flexCheckDefault">Resuelto</label>
                              </div>
                            <input class="btn btn-primary" type="submit" value="Aceptar">
                            @else 
                            <h4 style="color:green">Resuelto</h4>   
                            @endif
                            <a class="btn btn-warning" href="{{route("modificarBache")}}/{{$bache->id}}"> Modificar</a>
                          </div>
                      </div>
                  </div>
                </div>
                @endforeach
              </div>
            
          </div>
      </form>
      
        <div id="mapaBaches" style="width: 500px; height:500px">
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
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapaB"></script>

    