<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $fillable = [
        'codigo',
        'nombre',
        'creditos',
        'horas_teoria',
        'horas_practica',
        'ciclo',
        'tipo',
    ];

    protected function casts(): array
    {
        return [
            'creditos'       => 'integer',
            'horas_teoria'   => 'integer',
            'horas_practica' => 'integer',
        ];
    }

    // Accessor: en las vistas Blade se llama como $curso->horas_totales
    protected function horasTotales(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->horas_teoria +$this->horas_practica,
        );
    }
}