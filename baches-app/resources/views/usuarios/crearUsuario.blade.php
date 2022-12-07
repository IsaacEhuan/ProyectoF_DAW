<!DOCTYPE html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>


<div class="container mt-5">
    <div class="row" style="min-height: 85vh;">
        <div class="col border border-primary rounded-4">
            <h1></h1>
            <!--FRASE-->
        </div>

        <div class="col rounded-4 offset-1" style="background-color: #4ec9ff;">
            <h2 class="fw-bolt text-center py-1">Registrate</h2>

            <form method="POST" action="{{route('crearUsuario')}}">

                @csrf
                <div class="mb-3">
                    <label for="text" class="form-label">Nombre(s)</label>
                    <input type="text" name="nombre" id="" class="form-control">
                </div>

                @error('nombre')
                <p class="alert alert-danger" role="alert">* {{$message}}</p>
                @enderror

                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" name="email" id="" class="form-control">
                </div>

                @error('email')
                <p class="alert alert-danger" role="alert">* {{$message}}</p>
                @enderror

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="contrasena" id="" class="form-control">
                </div>

                @error('contrasena')
                <p class="alert alert-danger" role="alert">* {{$message}}</p>
                @enderror

                <div class="mb-3">
                    <label for="password" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="contrasena_confirmation" id="" class="form-control">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>

                <div class="my-3 text-center">
                    <span>¿Ya tienes una cuenta? <a href="{{route('iniciarSesion')}}">Iniciar Sesión</a></span>
                </div>
            </form>
        </div>
    </div>
</div>