<!DOCTYPE html>


<div>
    <h1 class="fw-bolt text-center py-1">BACHES-APP</h1>

    <ul>
        @guest
        <a class="justify-content-end" href="{{route('iniciarSesion')}}" style="text-decoration: none;">Iniciar Sesión</a>

        <a class="sr-only sr-only-focusable" href="{{route('crearUsuario')}}" style="text-decoration: none;">Unirse</a>
        @endguest

        @auth
        <li><a href="{{route('salir')}}">Salir</a></li>
        @endauth
    </ul>

</div>

@auth
<h2>{{Auth::user()->nombre}}</h2>
@if(Auth::user()->admin)
<h2>Administrador</h2>
@endif

@else
@include('usuarios.iniciarSesion')
@endauth