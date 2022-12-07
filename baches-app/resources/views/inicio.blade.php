<!DOCTYPE html>
<h1 class="fw-bolt text-center py-1">Inicio</h1>
@auth
    <h2>{{Auth::user()->nombre}}</h2>
    @if(Auth::user()->admin)
    <h2>Administrador</h2>
    @endif
    
@else
    @include('usuarios.iniciarSesion')
@endauth


<ul>
    @guest
    <div class="container">
        <div class="row">   
            <div class="col offset-7">
                <div >
                    <a class="justify-content-end" href="{{route('iniciarSesion')}}" style="text-decoration: none;">Iniciar Sesión</a>
                </div>
            </div>

            <div class="col">
                <a class="sr-only sr-only-focusable" href="{{route('crearUsuario')}}" style="text-decoration: none;">Unirse</a>
            </div>
        </div>
    </div>
    @endguest
    
    @auth
        <li><a href="{{route('salir')}}">Salir</a></li>
    @endauth
</ul>


