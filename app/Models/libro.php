<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'isbn',
        'descripcion',
        'paginas',
        'precio',
        'fecha_publicacion'
    ];

    protected $casts = [
        'fecha_publicacion' => 'date',
        'precio' => 'decimal:2'
    ];
}
