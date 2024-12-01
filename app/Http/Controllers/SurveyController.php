<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


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
        return redirect()->route('surveys.generated', $survey->uuid)
                         ->with('success', 'Encuesta creada exitosamente. Usa el enlace único para compartirla.');
     }

    public function index()
    {
        $surveys = Survey::where('created_by', Auth::id())->get();
        return view('surveys.index', compact('surveys'));
    }

    public function generated($uuid)
    {
        $survey = Survey::where('uuid', $uuid)->firstOrFail();

        return view('surveys.generated', compact('survey'));
    }

    public function show($id)
{
    $survey = Survey::with('responses')->findOrFail($id);
    
    // Obtén las preguntas de la encuesta
    $questions = $survey->questions;

    // Procesa las respuestas y cuenta cuántas veces aparece cada opción
    $chartData = [];
    $chartColors = [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)'
    ];

    foreach ($questions as $index => $question) {
        $answersCount = []; // Inicializa el contador para cada respuesta

        foreach ($survey->responses as $response) {
            $answers = json_decode($response->answers, true);
            $answer = $answers[$index] ?? 'No respondida';

            if (!isset($answersCount[$answer])) {
                $answersCount[$answer] = 0;
            }
            $answersCount[$answer]++;
        }

        $chartData[] = [
            'question' => $question['question'],
            'answers' => $answersCount,
        ];
    }

    return view('surveys.show', compact('survey', 'chartData', 'chartColors', 'questions'));
}





    public function destroy($id): RedirectResponse
    {
        Survey::find($id)->delete();

        return Redirect::route('surveys.index')
            ->with('success', 'Encuesta eliminada con éxito');
    }
}
