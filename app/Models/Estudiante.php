<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    // Atributos autorizados para asignación masiva en formularios
    protected $fillable = [
        'codigo',
        'nombres',
        'apellidos',
        'email',
        'ciclo',
        'promedio',
    ];

    // En Laravel 12 se utiliza el método casts() para tipado estricto
    protected function casts(): array
    {
        return [
            'promedio' => 'decimal:2',
        ];
    }
}