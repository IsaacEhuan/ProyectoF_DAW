<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div>
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{route('inicio')}}">Baches en tu zona</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('inicio')}}">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin')}}">Administrador</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('crearCuenta')}}">Crea una Cuenta</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('nosotros')}}">¿Quienes somos?</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('inicioConLog')}}">Iniciar Sesion</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
    </div>

    @yield('Contenido-Principal')
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>