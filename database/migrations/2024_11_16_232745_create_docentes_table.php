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
        Schema::create('docentes', function (Blueprint $table) {
            
            $table->id('id_docente');
            $table->unsignedBigInteger('id_curso_paralelo')->nullable();
            $table->unsignedBigInteger('id_periodo')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->foreign('id_curso_paralelo')->references('id_curso_paralelo')->on('curso_paralelo');
            $table->foreign('id_periodo')->references('id_periodo')->on('periodos');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
