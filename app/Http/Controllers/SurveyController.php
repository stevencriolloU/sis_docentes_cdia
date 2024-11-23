<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class SurveyController extends Controller
{
    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
        // Crear la encuesta con preguntas genéricas
        $survey = Survey::create([
            'uuid' => Str::uuid(), // Generar enlace único
            'questions' => json_encode([
                '¿Cuál es tu nombre?',
                '¿Qué opinas de esta materia?',
                '¿Cómo calificarías al docente?',
                '¿Qué mejorarías en el curso?',
                '¿Comentarios adicionales?',
            ]),
            'created_by' => Auth::id(),
        ]);
        return redirect()->route('surveys.show', $survey->uuid)
                         ->with('success', 'Encuesta creada exitosamente. Usa el enlace único para compartirla.');
     }

    public function index()
    {
        $surveys = Survey::where('created_by', Auth::id())->get();
        return view('docente.index', compact('surveys'));
    }

    public function show($uuid)
    {
        $survey = Survey::where('uuid', $uuid)->firstOrFail();

        return view('surveys.show', compact('survey'));
    }
}
