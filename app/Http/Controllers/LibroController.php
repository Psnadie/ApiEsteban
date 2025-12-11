<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::latest()->paginate(10);
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|min:3|max:255',
            'autor' => 'required|min:3|max:255',
            'isbn' => 'required|digits:13|unique:libros',
            'descripcion' => 'nullable|max:1000',
            'paginas' => 'required|numeric|min:1',
            'precio' => 'required|numeric|min:0',
            'fecha_publicacion' => 'required|date'
        ]);

        Libro::create($validated);

        return redirect()->route('libros.index')
            ->with('success', 'Libro creado exitosamente');
    }

    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        $validated = $request->validate([
            'titulo' => 'required|min:3|max:255',
            'autor' => 'required|min:3|max:255',
            'isbn' => 'required|digits:13|unique:libros,isbn,' . $libro->id,
            'descripcion' => 'nullable|max:1000',
            'paginas' => 'required|numeric|min:1',
            'precio' => 'required|numeric|min:0',
            'fecha_publicacion' => 'required|date'
        ]);

        $libro->update($validated);

        return redirect()->route('libros.index')
            ->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Libro eliminado exitosamente');
    }
}