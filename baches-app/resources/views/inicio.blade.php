<!DOCTYPE html>


<div class="navbar navbar-expand-lg" style="background: #5DADE2;">
    <div class="container-md">

        <h1 class="fw-bolt text-center py-1" style="color:white">BACHES-APP</h1>

        <div class="collapse navbar-collapse" id="navbarRightAlignExample">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    @guest
                    <a class="nav-link active" aria-current="page" href="{{route('iniciarSesion')}}" style="font-weight: bold; color:#FDFEFE; font-size:large">Iniciar Sesión</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('crearUsuario')}}" style="font-weight: bold; color:#FDFEFE">Unirse</a>
                    @endguest
                </li>

                @auth
                <li><a href="{{route('salir')}}">Salir</a></li>
                @endauth
            </ul>
        </div>
    </div>
</div>

@auth
<h2>{{Auth::user()->nombre}}</h2>
@if(Auth::user()->admin)
<h2>Administrador</h2>
@endif

@else
@include('usuarios.iniciarSesion')
@endauth