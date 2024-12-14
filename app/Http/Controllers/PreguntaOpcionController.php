<?php

namespace App\Http\Controllers;
use App\Models\Pregunta;
use App\Models\PreguntaOpcion;

use App\Models\Opcione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PreguntaOpcionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PreguntaOpcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Obtener todos los registros de PreguntaOpcion con sus relaciones de pregunta y opción
        $preguntaOpcions = PreguntaOpcion::with(['pregunta', 'opcion'])->paginate();

        return view('pregunta-opcion.index', compact('preguntaOpcions'))
            ->with('i', ($request->input('page', 1) - 1) * $preguntaOpcions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    // Obtener todas las preguntas y opciones desde la base de datos
    $preguntas = Pregunta::all(); 
    $opciones = Opcione::all();
    
    // Pasar las preguntas y opciones a la vista
    return view('pregunta-opcion.create', compact('preguntas', 'opciones'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(PreguntaOpcionRequest $request): RedirectResponse
    {
        // Crear una nueva PreguntaOpcion usando los datos validados
        PreguntaOpcion::create($request->validated());

        // Redirigir al listado con un mensaje de éxito
        return Redirect::route('pregunta-opcions.index')
            ->with('success', 'PreguntaOpcion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        // Buscar la PreguntaOpcion por su ID
        $preguntaOpcion = PreguntaOpcion::findOrFail($id);

        // Mostrar la vista de detalle
        return view('pregunta-opcion.show', compact('preguntaOpcion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        // Buscar la PreguntaOpcion por su ID
        $preguntaOpcion = PreguntaOpcion::findOrFail($id);
    
        // Obtener todas las preguntas y opciones disponibles
        $preguntas = Pregunta::all();
        $opciones = Opcione::all(); // Obtener todas las opciones disponibles
    
        // Pasar las preguntas, opciones y preguntaOpcion a la vista
        return view('pregunta-opcion.edit', compact('preguntaOpcion', 'preguntas', 'opciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PreguntaOpcionRequest $request, PreguntaOpcion $preguntaOpcion): RedirectResponse
    {
        // Actualizar la PreguntaOpcion con los datos validados
        $preguntaOpcion->update($request->validated());

        // Redirigir al listado con un mensaje de éxito
        return Redirect::route('pregunta-opcions.index')
            ->with('success', 'PreguntaOpcion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        // Buscar y eliminar la PreguntaOpcion por su ID
        PreguntaOpcion::findOrFail($id)->delete();

        // Redirigir al listado con un mensaje de éxito
        return Redirect::route('pregunta-opcions.index')
            ->with('success', 'PreguntaOpcion deleted successfully');
    }
}
