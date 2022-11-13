@extends('layouts.plantilla')

@section('title','Crear Cuenta')

@section('Contenido-Principal')
<div class="container mt-5">
        <div class="row">
            
            <div class="col">

            </div>


            <div class="col">
                <h2 class="fw-bolt text-center py-1">Registrate</h2>

                <form action="#">
                    <div class="mb-4">
                        <label for="text" class="form-label">Nombres</label>
                        <input type="text" name="text" id="" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="text" class="form-label">Apellidos</label>
                        <input type="text" name="text" id="" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>

                    <div class="my-3 text-center">
                        <span>¿Ya tienes una cuenta? <a href="{{route('inicioConLog')}}">Iniciar Sesión</a></span>
                    </div>
                </form>
            </div>
        </div>


    </div>

@endsection









<!--

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/885118e8a7.js" crossorigin="anonymous"></script>

    <title>Document</title>
     
    
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            font-size: cover;
            background-attachment: fixed;
        }

        *{
            box-sizing: border-box;
        }

        .contenido{
            width: 100%;
            padding: 15px;
        }

        .formulario{
            background:darkkhaki;
            margin-top: 150px;
            padding: 3px;
        }

        h1{
            text-align: center;
            color: #1a2537;
            font-size: 40px;
        }

        input[type="text"], input[type="password"], input[type="email"]{
            font-size: 20px;
            width: 80%;
            padding: 20px;
            border: none;
        }

        .input-contenido{
            margin-bottom: 15px;
            border: 1px solid #aaa;
        }

        .icon{
            min-width: 50px;
            text-align: center;
            color: #999;
        }

        .button{
            border: none;
            width: 100%;
            color:white;
            background:white;
            padding: 15px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover{
            background: cadetblue;
        }

        p{
            text-align: center;
        }

        .link{
            text-decoration: none;
            font-weight: 600;
        }

        .link:hover{
            color: cadetblue;
        }

        @media(min-width:768){
            .formulario{
                margin: auto;
                width: 500px;
                margin-top: 150px;
                border-radius: 4px;
            }
        }
    
    </style>


</head>
<body>
<form action="" class="formulario">
        <h1>Regístrate</h1>
        <div class="contenido">
            <div class="input-contenido">
            <i class="fa-solid fa-user icon"></i>
                <input type="text" name="" id="" placeholder="Nombre Completo">
            </div>

            <div class="input-contenido">
            <i class="fa-solid fa-envelope icon"></i>
                <input type="email" name="" id="" placeholder="Correo Electrónico">
            </div>

            <div class="input-contenido">
            <i class="fa-solid fa-key icon"></i>
                <input type="password" name="" id="" placeholder="Contraseña">
            </div>
            
            <input type="submit" value="Registrar" class="button">
            <p>Al registrarte, aceptas nuestras Condiciones de uso y Politica de privacidad.</p>
            <p>¿Ya tines una cuenta? <a class="link" href="{{route('inicioConLog')}}">Iniciar Sesion</a></p>

        </div>
    </form>
</body>
</html>
-->