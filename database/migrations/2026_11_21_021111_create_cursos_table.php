<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {$table->id();
            $table->string('codigo', 10)->unique();$table->string('nombre', 100);
            $table->unsignedTinyInteger('creditos');$table->unsignedTinyInteger('horas_teoria')->default(0);
            $table->unsignedTinyInteger('horas_practica')->default(0);$table->string('ciclo', 5);
            $table->enum('tipo', ['Obligatorio', 'Electivo'])->default('Obligatorio');$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};