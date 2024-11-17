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
        Schema::create('preguntas', function (Blueprint $table) {
            
            $table->id('id_pregunta');
            $table->unsignedBigInteger('id_encuesta')->nullable();
            $table->text('texto_pregunta');
            $table->enum('Type', ['short_text', 'multiple_choice', 'single_choice']);
            $table->foreign('id_encuesta')->references('id_encuesta')->on('encuestas');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
