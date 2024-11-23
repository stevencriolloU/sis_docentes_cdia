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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id(); // ID único de la encuesta
            $table->string('title', 100)->nullable(); // Nombre de la encuesta
            $table->uuid('uuid')->unique(); // Generar enlaces únicos
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Relación con el docente
            $table->json('results')->nullable(); // Almacenar resultados en formato JSON
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
