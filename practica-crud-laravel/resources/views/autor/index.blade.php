@extends('layout/main')

@section('contenido')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Gestión de Autores</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="text-secondary">Lista de Autores</h5>
                            <a href="{{ route('create') }}" class="btn btn-success">
                                <i class="fa-solid fa-user-plus"></i> Agregar Autor
                            </a>
                        </div>
                        <table class="table table-hover table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Autor</th>
                                    <th>Nacionalidad</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($autores as $autor)  
                                <tr>
                                    <td>{{ $autor->codigo_autor }}</td>
                                    <td>{{ $autor->nombre_autor }}</td>
                                    <td>{{ $autor->nacionalidad }}</td>
                                    <td>
                                        <form action="{{ route('destroy', $autor->codigo_autor) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('show', $autor->codigo_autor) }}" class="btn btn-info btn-sm">
                                                <i class="fa-solid fa-list"></i> Mostrar
                                            </a>
                                            <a href="{{ route('edit', $autor->codigo_autor) }}" class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-user-pen"></i> Editar
                                            </a>
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este autor?')">
                                                <i class="fa-solid fa-trash"></i> Borrar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No hay datos disponibles...</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection