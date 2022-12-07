<div>
    <div class="row" style="background: #EDBB99;width:100">
        <marquee behavior="" direction="right" style="color:red;">!REPORTA TU BACHE!</marquee>
    </div>

    <div class="row">
        <div class="col-2">
            <nav class="navbar navbar-dark" style="background: #EDBB99; width:150px; height: 98vh">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{route('inicio')}}">BACHES APP</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        @auth
                        <p class="fs-3">
                        <h1 style="text-align: Center; font-size:medium; display:inline; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Bienvenido: {{Auth::user()->nombre}}</b></p>
                            <ul class="navbar-nav">

                                <li class="nav-item">
                                    <a class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none" href="{{route('crearBache')}}">Crear Bache</a>
                                </li>

                                <li class="nav-item">

                                </li>

                                <li class="nav-item">

                                </li>

                                <li class="nav-item">

                                </li>

                                <li class="nav-item">
                                    <a class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none" href="{{route('salir')}}">Salir</a>

                                </li>
                            </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col">
            @if(Auth::user()->admin)
        </div>
    </div>
</div>







@guest
<li>Baches App</li>
<li><a href="{{route('iniciarSesion')}}">Iniciar Secion</a></li>
<li><a href="{{route('crearUsuario')}}">Unirse</a></li>
@endguest


@endif
@endauth

<style>
    @media (min-width: 992px) {
        @media (min-width: 992px) {

            .navbar,
            .navbar-collapse {
                flex-direction: column;
            }

            .navbar-expand-lg .navbar-nav {
                flex-direction: column;
            }

            .navbar {
                width: 28%;
                height: 100vh;
                align-items: flex-start;
            }

            .navbar-brand {
                margin-left: 0.5em;
                padding-bottom: 0;
                border-bottom: 4px solid #464646;
            }

            form input {
                margin-bottom: 0.7em;
            }
        }
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>