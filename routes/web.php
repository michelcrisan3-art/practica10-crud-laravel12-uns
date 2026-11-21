<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

// Redirección de la raíz hacia el módulo de estudiantes
Route::redirect('/', '/estudiantes');

// Registra automáticamente las 7 rutas RESTful de recurso
Route::resource('estudiantes', EstudianteController::class);