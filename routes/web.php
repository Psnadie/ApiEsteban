<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LibroApiController;

Route::get('/', function () {
    return redirect()->route('libros.index');
});

