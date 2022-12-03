<!DOCTYPE html>
<h1>Inicio</h1>
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
    <li><a href="{{route('iniciarSesion')}}">Iniciar Secion</a></li>
    <li><a href="{{route('crearUsuario')}}">Unirse</a></li>
    @endguest
    
    @auth
        <li><a href="{{route('salir')}}">Salir</a></li>
    @endauth
</ul>


