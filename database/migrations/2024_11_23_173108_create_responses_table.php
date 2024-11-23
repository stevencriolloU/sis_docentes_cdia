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
        Schema::create('responses', function (Blueprint $table) {
            $table->id(); // ID único de la respuesta
            $table->foreignId('survey_id')->constrained()->onDelete('cascade'); // Relación con la encuesta
            $table->tinyInteger('question_1')->nullable(); // Respuesta de 1 a 5
            $table->tinyInteger('question_2')->nullable(); // Respuesta de 1 a 5
            $table->boolean('question_3')->nullable(); // Sí/No
            $table->boolean('question_4')->nullable(); // Sí/No
            $table->boolean('question_5')->nullable(); // Sí/No
            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
