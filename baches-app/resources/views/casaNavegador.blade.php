<ul>
@guest
    <li>BACHES-APP</li>
    <li><a href="{{route('iniciarSesion')}}">Iniciar Secion</a></li>
    <li><a href="{{route('crearUsuario')}}">Unirse</a></li>
@endguest

@auth
    <li>BACHES APP</li>
    <li>{{Auth::user()->nombre}}</li>
    <li><a href="{{route('crearBache')}}">Crear Bache</a></li>
    <li><a href="{{route('salir')}}">Salir</a></li>
@if(Auth::user()->admin)

@endif
@endauth
</ul>
