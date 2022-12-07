<ul>
@guest
    <li>Baches App</li>
    <li><a href="{{route('iniciarSesion')}}">Iniciar Secion</a></li>
    <li><a href="{{route('crearUsuario')}}">Unirse</a></li>
@endguest

@auth
    <li>Baches App</li>
    <li>{{Auth::user()->nombre}}</li>
    <li><a href="{{route('salir')}}">Salir</a></li>
    <li><a href="{{route('casa')}}">Casa</a></li>
    <li><a href="{{route('misBaches')}}">Mis Baches</a></li>
    <li><a href="{{route('crearBache')}}">Crear Bache</a></li>
@if(Auth::user()->admin)
    <li><a href="{{route('tablaBaches')}}">Baches|Tabla</a></li>
@endif
@endauth
</ul>
@include('baches.buscarBache')
