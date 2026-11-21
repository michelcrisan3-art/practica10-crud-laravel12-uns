<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->char('dni', 8)->unique();
            $table->string('codigo_docente', 10)->unique();
            $table->string('nombres', 60);
            $table->string('apellidos', 60);
            $table->string('email_institucional', 80)->unique();
            $table->enum('categoria', ['Principal', 'Asociado', 'Auxiliar', 'Contratado']);
            $table->enum('dedicacion', ['Exclusiva', 'Tiempo Completo', 'Tiempo Parcial']);
            $table->enum('grado_maximo', ['Licenciado', 'Magister', 'Doctor']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};