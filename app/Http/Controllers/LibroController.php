<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $libros = Libro::paginate(10);
        
        return response()->json([
            'success' => true,
            'data' => $libros
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
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

        $libro = Libro::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Libro creado exitosamente',
            'data' => $libro
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro): JsonResponse
    {

        if (!$libro) {
            return response()->json([
                'success' => false,
                'message' => 'Libro no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $libro
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json([
                'success' => false,
                'message' => 'Libro no encontrado'
            ], 404);
        }

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

        return response()->json([
            'success' => true,
            'message' => 'Libro actualizado exitosamente',
            'data' => $libro
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json([
                'success' => false,
                'message' => 'Libro no encontrado'
            ], 404);
        }

        $libro->delete();

        return response()->json([
            'success' => true,
            'message' => 'Libro eliminado exitosamente'
        ], 200);
    }
}