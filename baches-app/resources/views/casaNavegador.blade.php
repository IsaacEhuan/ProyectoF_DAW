<nav class="navbar navbar-expand-lg " style="background:#84b6f4 ;">
    <div class="container-fluid">

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                @auth
                <h2 class="mx-auto" style="width: 750px;">BACHES-APP</h2>
                
                
                    <a href="{{route('casa')}}" class="nav-item nav-link">Casa</a>
                    <a href="{{route('misBaches')}}" class="nav-item nav-link">Mis Baches</a>
                    <a href="{{route('crearBache')}}" class="nav-item nav-link">Subir Bache</a></li>
                    
                    @if(Auth::user()->admin)
                    <a href="{{route('tablaBaches')}}" class="nav-item nav-link">Baches|Tabla</a>
                    @endif
                    <a href="{{route('salir')}}" class="nav-item nav-link">Salir</a>
                    @endauth
               
            </div>
            <div class="navbar-nav ms-auto">
                @guest
                <h2>BACHES-APP</h2>
                <a href="{{route('iniciarSesion')}}">Iniciar Secion</a>
                <a href="{{route('crearUsuario')}}">Unirse</a>
                @endguest
            </div>
        </div>
    </div>
</nav>

@auth
<h2 class="mx-auto" style="text-align: center;">Bienvenido {{Auth::user()->nombre}}</h2>
@endauth












</ul>







<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>