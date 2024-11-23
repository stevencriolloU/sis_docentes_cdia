<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ResponseController extends Controller
{
    public function show($uuid)
    {
        $survey = Survey::where('uuid', $uuid)->firstOrFail();
        return view('surveys.respond', compact('survey'));
    }

    public function store(Request $request, $uuid)
    {
        $survey = Survey::where('uuid', $uuid)->firstOrFail();

        if (!$survey) {
            return redirect()->route('home')->with('error', 'Encuesta no encontrada.');
        }

        // Valida las respuestas
        $request->validate([
            'responses' => 'required|array',
            'responses.*' => 'required|string',
        ]);

        // Almacenar las respuestas del estudiante
        $responsesData = $request->input('responses');

        Response::create([
            'survey_id' => $survey->id,
            'user_id' => Auth::id(),
            'answers' => json_encode($responsesData),
        ]);

        return  view('surveys.thankyou');
    }
}
