<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use DragonCode\Contracts\Cashier\Auth\Auth;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    /**
     * Muestra la vista para crear una encuesta.
     */
    public function create()
    {
        return view('surveys.create');
    }

    /**
     * Almacena una nueva encuesta en la base de datos.
     */
    public function store(Request $request)
    {
        // Crear una nueva encuesta
        $survey = Survey::create([
            'title' => 'Encuesta sobre clases virtuales', // Título de la encuesta
            'uuid' => Str::uuid(), // Generar un UUID único
            'created_by' => 2, // ID del usuario que la crea            
        ]);

        // Redirigir a una página que muestra el enlace único de la encuesta
        return redirect()->route('surveys.show', $survey->uuid)
            ->with('success', 'Encuesta creada exitosamente.');
    }

    /**
     * Muestra el enlace único de una encuesta.
     */
    public function show($uuid)
    {
        // Obtener la encuesta por su UUID
        $survey = Survey::where('uuid', $uuid)->firstOrFail();

        // Pasar la encuesta a la vista
        return view('surveys.show', compact('survey'));
    }

    /**
     * Muestra los resultados de una encuesta al docente.
     */
    public function results($uuid)
    {
        // Obtener la encuesta por su UUID
        $survey = Survey::where('uuid', $uuid)->firstOrFail();

        // Obtener las respuestas asociadas
        $responses = $survey->responses;

        // Pasar los datos a la vista de resultados
        return view('surveys.results', compact('survey', 'responses'));
    }
}
