<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

Route::get('/', function () {
    return redirect()->route('libros.index');
});

Route::resource('libros', LibroController::class);