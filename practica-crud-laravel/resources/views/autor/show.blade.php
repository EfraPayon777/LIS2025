@extends('layout/main')

@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-info text-white text-center">
                    <h3>Detalles del Autor</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Nacionalidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $item->codigo_autor }}</td>
                                <td>{{ $item->nombre_autor }}</td>
                                <td>{{ $item->nacionalidad }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('autores.index') }}" class="btn btn-secondary">
                            <i class="fa-solid fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection