<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LibroApiController;

Route::apiResource('libros', LibroApiController::class)->names([
    'index' => 'api.libros.index',
    'store' => 'api.libros.store',
    'show' => 'api.libros.show',
    'update' => 'api.libros.update',
    'destroy' => 'api.libros.destroy',
]);