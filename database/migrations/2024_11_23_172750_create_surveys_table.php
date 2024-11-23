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
            $table->id();
            $table->uuid('uuid')->unique(); // UUID para el enlace único
            $table->string('title')->default('Encuesta Genérica');
            $table->json('questions'); // Almacena las preguntas en formato JSON
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Relación con el docente
            $table->timestamps();
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
