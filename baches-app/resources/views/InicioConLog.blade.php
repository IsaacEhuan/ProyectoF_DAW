@extends('layouts.plantilla')

@section('title','inicio')

@section('Contenido-Principal')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <!--Logo-->
            </div>


            <div class="col">
                <h2 class="fw-bolt text-center py-5">Bienvenido</h2>

                <form action="#">

                    <div class="mb-4">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </div>

                    <div class="my-3 text-center">
                        <span>¿No tienes una cuenta? <a href="{{route('crearCuenta')}}">Registrate</a></span>
                    </div>
                </form>
            </div>
        </div>


    </div>

@endsection
