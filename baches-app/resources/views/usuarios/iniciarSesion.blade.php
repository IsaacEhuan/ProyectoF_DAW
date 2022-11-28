<!DOCTYPE html>

<form method="POST" action="{{route('iniciarSesion')}}">
    @csrf
    <label for="email">Correo</label>
    <input type="email" name="email" id="email">
    @error('email')
        <p >{{$message}}</p>
    @enderror
    <br>

    <label for="contrasena">Contraseña</label>
    <input type="password" name="contrasena" id="contrasena">
    @error('contrasena')
        <p>{{$message}}</p>
    @enderror
    <br>
    <button type="submit">Iniciar Sesion</button>
</form>