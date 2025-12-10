@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Detalles del Libro</h3>
        <a href="{{ route('libros.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Título:</strong> {{ $libro->titulo }}</p>
                <p><strong>Autor:</strong> {{ $libro->autor }}</p>
                <p><strong>ISBN:</strong> {{ $libro->isbn }}</p>
                <p><strong>Páginas:</strong> {{ $libro->paginas }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Precio:</strong> €{{ number_format($libro->precio, 2) }}</p>
                <p><strong>Fecha de Publicación:</strong> {{ $libro->fecha_publicacion->format('d/m/Y') }}</p>
                <p><strong>Creado:</strong> {{ $libro->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Actualizado:</strong> {{ $libro->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
        
        @if($libro->descripcion)
        <div class="mt-3">
            <strong>Descripción:</strong>
            <p>{{ $libro->descripcion }}</p>
        </div>
        @endif

        <div class="mt-4">
            <a href="{{ route('libros.edit', $libro) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('libros.destroy', $libro) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection