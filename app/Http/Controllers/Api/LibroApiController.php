<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class LibroApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $libros = Libro::latest()->paginate(10);

            return response()->json([
                'success' => true,
                'data' => $libros
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los libros',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
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
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el libro',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $libro = Libro::find($id);

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
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el libro',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
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
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el libro',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
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
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el libro',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
