<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_docente')
                  ->constrained('docentes') // Relación con la tabla docentes
                  ->onDelete('cascade'); // Elimina asignatura si el docente se borra
            $table->foreignId('id_curso')
                  ->constrained('cursos') // Relación con la tabla cursos
                  ->onDelete('cascade'); // Elimina asignatura si el curso se borra
            $table->string('nombre_asignatura'); // Nombre de la asignatura
            $table->string('periodo')->default('2024-2S'); // Periodo con valor por defecto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaturas');
    }
};
