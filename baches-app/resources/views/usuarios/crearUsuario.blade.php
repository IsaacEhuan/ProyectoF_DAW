<!DOCTYPE html>
<div class="col">
    <h2 class="fw-bolt text-center py-1">Registrate</h2>

    <form  method="POST" action="{{route('crearUsuario')}}">

        @csrf
        <div class="mb-4">
            <label for="text" class="form-label">Nombre(s)</label>
            <input type="text" name="nombre" id="">
        </div>

        @error('nombre')
            <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror
    
        <div class="mb-4">
            <label for="email" class="form-label">Correo</label>
            <input type="email" name="email" id="" class="form-control">
        </div>

        @error('email')
            <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror

        <div class="mb-4">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="contrasena" id="" class="form-control">
        </div>
        
        @error('contrasena')
            <p class="alert alert-danger" role="alert">* {{$message}}</p>
        @enderror

        <div class="mb-4">
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