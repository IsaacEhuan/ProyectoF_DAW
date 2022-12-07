
<div class="navbar navbar-expand-lg" style="background: #45B39D;">

    <div class="container-md">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @auth
            <h1 style="color:white; display:inline;">BACHES-APP</h1>

            <h1 style="text-align: right; font-size:x-large; display:inline; margin-left:650px; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color:#4c56ff">Bienvenido: {{Auth::user()->nombre}}</h1>

        </ul>
    </div>
</div>
<li><a href="{{route('crearBache')}}">Crear Bache</a></li>
<li><a href="{{route('salir')}}">Salir</a></li>
@if(Auth::user()->admin)



@guest
<li>Baches App</li>
<li><a href="{{route('iniciarSesion')}}">Iniciar Secion</a></li>
<li><a href="{{route('crearUsuario')}}">Unirse</a></li>
@endguest


@endif
@endauth