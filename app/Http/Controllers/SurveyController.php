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
        // Validamos que las preguntas estén presentes
        $request->validate([
            'questions' => 'required|array',
            'questions.*.question' => 'required|string',
            'questions.*.type' => 'required|string',
            'questions.*.options' => 'nullable|array',
        ]);

        // Procesar las preguntas y almacenarlas
        $questions = collect($request->questions)->map(function ($question) {
            return [
                'question' => $question['question'],
                'type' => $question['type'],
                'options' => $question['options'] ?? [],
            ];
        });


        // Crear la encuesta con preguntas personalizadas
        $survey = Survey::create([
            'uuid' => Str::uuid(),
            'questions' => $questions,
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
