<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Libro;

class LibroSeeder extends Seeder
{
    public function run(): void
    {
        $libros = [
            [
                'titulo' => 'Cien años de soledad',
                'autor' => 'Gabriel García Márquez',
                'isbn' => '9788437604947',
                'descripcion' => 'La obra maestra del realismo mágico',
                'paginas' => 471,
                'precio' => 19.90,
                'fecha_publicacion' => '1967-05-30'
            ],
            [
                'titulo' => 'Don Quijote de la Mancha',
                'autor' => 'Miguel de Cervantes',
                'isbn' => '9788491050513',
                'descripcion' => 'La novela más importante de la literatura española',
                'paginas' => 1200,
                'precio' => 25.00,
                'fecha_publicacion' => '1605-01-16'
            ],
            [
                'titulo' => '1984',
                'autor' => 'George Orwell',
                'isbn' => '9788499890944',
                'descripcion' => 'Distopía sobre el totalitarismo',
                'paginas' => 328,
                'precio' => 15.50,
                'fecha_publicacion' => '1949-06-08'
            ],
        ];

        foreach ($libros as $libro) {
            Libro::create($libro);
        }
    }
}
