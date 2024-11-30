<?php

namespace App\Http\Controllers;

use App\Models\EncuestaPreguntum;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EncuestaPreguntumRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Encuesta;
use App\Models\Pregunta;

class EncuestaPreguntumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $encuestaPregunta = EncuestaPreguntum::paginate();

        return view('encuesta-preguntum.index', compact('encuestaPregunta'))
            ->with('i', ($request->input('page', 1) - 1) * $encuestaPregunta->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $encuestaPreguntum = new EncuestaPreguntum();
        $encuestas = Encuesta::all(); // O aplica filtros si es necesario
        $preguntas = Pregunta::all();

        return view('encuesta-preguntum.create', compact('encuestaPreguntum', 'encuestas','preguntas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EncuestaPreguntumRequest $request): RedirectResponse
    {
        EncuestaPreguntum::create($request->validated());

        return Redirect::route('encuesta-pregunta.index')
            ->with('success', 'EncuestaPreguntum created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $encuestaPreguntum = EncuestaPreguntum::find($id);

        return view('encuesta-preguntum.show', compact('encuestaPreguntum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $encuestaPreguntum = EncuestaPreguntum::find($id);

        return view('encuesta-preguntum.edit', compact('encuestaPreguntum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EncuestaPreguntumRequest $request, EncuestaPreguntum $encuestaPreguntum): RedirectResponse
    {
        $encuestaPreguntum->update($request->validated());

        return Redirect::route('encuesta-pregunta.index')
            ->with('success', 'EncuestaPreguntum updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        EncuestaPreguntum::find($id)->delete();

        return Redirect::route('encuesta-pregunta.index')
            ->with('success', 'EncuestaPreguntum deleted successfully');
    }
}
