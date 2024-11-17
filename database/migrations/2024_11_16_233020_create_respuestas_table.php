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
        Schema::create('respuestas', function (Blueprint $table) {
            
            $table->id('id_respuesta');
            $table->unsignedBigInteger('id_encuesta')->nullable();
            $table->unsignedBigInteger('id_pregunta')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->text('respuesta');
            $table->foreign('id_encuesta')->references('id_encuesta')->on('encuestas');
            $table->foreign('id_pregunta')->references('id_pregunta')->on('preguntas');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};
