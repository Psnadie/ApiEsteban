<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LibroApiController;

Route::apiResource('libros', LibroApiController::class);