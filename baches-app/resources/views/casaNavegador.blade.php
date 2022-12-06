<ul>
@guest
    <li>Baches App</li>
    <li><a href="{{route('iniciarSesion')}}">Iniciar Secion</a></li>
    <li><a href="{{route('crearUsuario')}}">Unirse</a></li>
@endguest

@auth
    <li>Baches App</li>
    <li>{{Auth::user()->nombre}}</li>
    <li><a href="{{route('crearBache')}}">Crear Bache</a></li>
    <li><a href="{{route('salir')}}">Salir</a></li>
@if(Auth::user()->admin)

@endif
@endauth
</ul>
