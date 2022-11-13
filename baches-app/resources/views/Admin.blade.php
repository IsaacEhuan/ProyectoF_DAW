@extends('layouts.plantilla')


@section('title','Administrador')

@section('Contenido-Principal')
<h1 class="text-center border border-warning">Control Principal</h1>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <table class="table">
                    <thead class="table-primary">
                        <th>ID Bache</th>
                        <th>Imagen</th>
                        <th>Status</th>
                        <th>Descripcion</th>
                    </thead>
                </table>
            </div>

            <div class="col">
                <div class="mb-4 text-center">
                    <button type="button" class="btn btn-outline-danger">Eliminar</button>
                    <button type="button" class="btn btn-outline-primary">Editar</button>
                </div>

                <div class="mb-4 border border border-primary">
                    <h4 class="text-center">Filtros</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
