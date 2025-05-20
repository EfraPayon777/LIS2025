@extends('layout/main')

@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white text-center">
                    <h3>Editar Autor</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update', $item->codigo_autor) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre_autor" class="form-label">Nombre del Autor</label>
                            <input type="text" name="nombre_autor" id="nombre_autor" class="form-control" value="{{ $item->nombre_autor }}" placeholder="Ingrese el nombre del autor" required>
                        </div>

                        <div class="mb-3">
                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                            <input type="text" name="nacionalidad" id="nacionalidad" class="form-control" value="{{ $item->nacionalidad }}" placeholder="Ingrese la nacionalidad" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-check"></i> Actualizar
                            </button>
                            <a href="{{ route('autores.index') }}" class="btn btn-secondary">
                                <i class="fa-solid fa-arrow-left"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection