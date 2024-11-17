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
            $table->id('id_curso_paralelo');
            $table->unsignedBigInteger('id_curso')->nullable();
            $table->unsignedBigInteger('id_paralelo')->nullable();
            $table->foreign('id_curso')->references('id_curso')->on('cursos');
            $table->foreign('id_paralelo')->references('id_paralelo')->on('paralelos');
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
