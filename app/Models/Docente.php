<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';

    protected $fillable = [
        'dni',
        'codigo_docente',
        'nombres',
        'apellidos',
        'email_institucional',
        'categoria',
        'dedicacion',
        'grado_maximo',
    ];
}