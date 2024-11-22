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
        Schema::create('encuestas', function (Blueprint $table) {
            
            $table->id(); // Crea la columna 'id' autoincrementable
            $table->unsignedBigInteger('id_registro_clase')->nullable();
            $table->date('fecha_creacion');
            $table->enum('estado', ['Pendiente', 'Finalizar']);
            $table->string('enlace_encuesta', 255);
            $table->timestamps();
            
            $table->foreign('id_registro_clase')->references('id')->on('clases');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuestas');
    }
};
