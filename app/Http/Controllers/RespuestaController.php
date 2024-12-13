<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Encuesta;
use Illuminate\Support\Facades\Auth;

class RespuestaController extends Controller
{    
    public function index(Request $request): View
    {
        $respuestas = Respuesta::paginate();

        return view('respuesta.index', compact('respuestas'))
            ->with('i', ($request->input('page', 1) - 1) * $respuestas->perPage());
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $uuid): View
    {
        // Buscar la encuesta por UUID
        $encuesta = Encuesta::where('uuid', $uuid)->firstOrFail();

        // Validar las respuestas
        $validated = $request->validate([
            'preguntas' => 'required|array',
            'preguntas.*' => 'required|exists:opciones,id',
        ]);

        // Recorrer y guardar cada respuesta
        foreach ($validated['preguntas'] as $id_pregunta => $opcion_id) {
            Respuesta::create([
                'id_encuesta' => $encuesta->id,
                'id_pregunta' => $id_pregunta,
                'opcion_id' => $opcion_id,
                'id_usuario' => Auth::id(),
            ]);
        }

        return view('respuesta.thankyou');
    }

    /** 
     * Display the specified resource.
     */
    public function show($id)
    {
        /*
        $encuesta = Encuesta::with(['preguntas.respuestas.opcion', 'preguntas.respuestas.user'])
            ->findOrFail($id);
        */
        // Obtener la encuesta con sus preguntas y respuestas
        $encuesta = Encuesta::with(['preguntas.respuestas.opcion'])
            ->findOrFail($id);

        //dd($encuesta->preguntas);

        return view('respuesta.show', compact('encuesta'));
    }        
}
