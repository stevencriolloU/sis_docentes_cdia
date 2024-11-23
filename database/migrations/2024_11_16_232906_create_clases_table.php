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
        Schema::create('clases', function (Blueprint $table) {

        $table->id(); // Crea la columna 'id' autoincrementable
        $table->unsignedBigInteger('id_docente')->nullable();
        $table->time('hora_inicio'); // Hora de inicio de la clase ejemplo 17:00
        $table->time('hora_fin'); // Hora de fin de la clase ejemplo 19:00
        $table->timestamps();

        $table->foreign('id_docente')->references('id')->on('docentes')->onDelete('set null');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};
