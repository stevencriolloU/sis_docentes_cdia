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
        Schema::create('encuesta_pregunta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('encuesta_id')->constrained('encuestas')->onDelete('cascade'); // Relación con encuestas
            $table->foreignId('pregunta_id')->constrained('preguntas')->onDelete('cascade'); // Relación con preguntas
            $table->timestamps();

            // Índice único compuesto para evitar duplicados
            $table->unique(['encuesta_id', 'pregunta_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuesta_pregunta');
    }
};
