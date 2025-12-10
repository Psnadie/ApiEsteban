@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Crear Nuevo Libro</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('libros.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control @error('titulo') is-invalid @enderror" 
                       id="titulo" name="titulo" value="{{ old('titulo') }}" required>
                @error('titulo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control @error('autor') is-invalid @enderror" 
                       id="autor" name="autor" value="{{ old('autor') }}" required>
                @error('autor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN (13 dígitos)</label>
                <input type="text" class="form-control @error('isbn') is-invalid @enderror" 
                       id="isbn" name="isbn" value="{{ old('isbn') }}" required>
                @error('isbn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                          id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="paginas" class="form-label">Páginas</label>
                        <input type="number" class="form-control @error('paginas') is-invalid @enderror" 
                               id="paginas" name="paginas" value="{{ old('paginas') }}" required>
                        @error('paginas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio (€)</label>
                        <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" 
                               id="precio" name="precio" value="{{ old('precio') }}" required>
                        @error('precio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
                        <input type="date" class="form-control @error('fecha_publicacion') is-invalid @enderror" 
                               id="fecha_publicacion" name="fecha_publicacion" value="{{ old('fecha_publicacion') }}" required>
                        @error('fecha_publicacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection