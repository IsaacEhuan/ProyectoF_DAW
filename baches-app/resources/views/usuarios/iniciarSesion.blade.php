<!DOCTYPE html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>


<div class="container mt-5">
    <div class="row" style="min-height: 85vh;">

        <div class="col border border-primary rounded-5">
            <!--MAPA-->
            <h1></h1>
        </div>

        <div class="col rounded-5 offset-1" style="background-color: #4ec9ff;">

            <h2 class="fw-bolt text-center py-5 text-white">BIENVENIDO</h2>

            <form method="POST" action="{{route('iniciarSesion')}}">
                @csrf
                <div class="mb-5">
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                @error('email')
                    <p class="alert alert-danger">{{$message}}</p>
                @enderror

                <div class="mb-5">
                    <label for="contrasena">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena" class="form-control">
                </div>
                @error('contrasena')
                    <p class="alert alert-danger">{{$message}}</p>
                @enderror

                <div>
                    <button type="submit" class="btn btn-warning btn-sm text-white">Iniciar Sesión</button>
                </div>
            </form>

        </div>


    </div>
</div>