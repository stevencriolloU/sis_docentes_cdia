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
        Schema::create('cursoparalelos', function (Blueprint $table) {
            $table->id(); // Crea la columna 'id' autoincrementable
            $table->unsignedBigInteger('id_curso')->nullable(); // Columna para la relación con 'cursos'
            $table->unsignedBigInteger('id_paralelo')->nullable(); // Columna para la relación con 'paralelos'
            // Definición de las claves foráneas
            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete('set null'); // Relación con 'cursos'
            $table->foreign('id_paralelo')->references('id')->on('paralelos')->onDelete('set null'); // Relación con 'paralelos'
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursoparalelos');
    }
};
