@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Lista de Libros</h2>
    <a href="{{ route('libros.create') }}" class="btn btn-primary">➕ Nuevo Libro</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>ISBN</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($libros as $libro)
                <tr>
                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->isbn }}</td>
                    <td>€{{ number_format($libro->precio, 2) }}</td>
                    <td>
                        <a href="{{ route('libros.show', $libro) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('libros.edit', $libro) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('libros.destroy', $libro) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No hay libros registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $libros->links() }}
        </div>
    </div>
</div>
@endsection