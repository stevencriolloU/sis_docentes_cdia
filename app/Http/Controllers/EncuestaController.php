<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use App\Models\Asignatura;
use App\Models\Pregunta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EncuestaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Obtener el docente autenticado
        $docenteId = auth()->user()->docente->id ?? 0;

        // Verificar si el usuario tiene el rol de admin
        if (auth()->user()->hasRole('admin')) {
            // Si es admin, obtener todas las encuestas
            $encuestas = Encuesta::paginate();
        } else {
            // Si no es admin, filtrar las encuestas creadas por el docente autenticado
            $encuestas = Encuesta::where('creado_por', $docenteId)->paginate();
        }
        return view('encuesta.index', compact('encuestas'))
            ->with('i', ($request->input('page', 1) - 1) * $encuestas->perPage());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Obtener preguntas con sus opciones y asignaturas
        $preguntas = \App\Models\Pregunta::with('opciones')->get();
        $asignaturas = \App\Models\Asignatura::all();

        // Crear un objeto vacío de Encuesta para el formulario
        $encuesta = new Encuesta();        

        return view('encuesta.create', compact('encuesta', 'preguntas', 'asignaturas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EncuestaRequest $request): RedirectResponse
    {        
        // Validar las preguntas seleccionadas
        $validated = $request->validate([
            'nombre_encuesta' => 'required|string|max:255',
            'id_asignatura' => 'required|exists:asignaturas,id',
            'creado_por' => 'required|exists:docentes,id',
            'preguntas' => 'required|array|min:1',
            'preguntas.*' => 'exists:preguntas,id',
        ]);

        // Generar un UUID único
        $uuid = Str::uuid();

        // Crear la encuesta
        $encuesta = Encuesta::create([
            'id_asignatura' => $validated['id_asignatura'],
            'nombre_encuesta' => $validated['nombre_encuesta'],
            'creado_por' => $validated['creado_por'],
            'uuid' => $uuid,
            'enlace_encuesta' => url('/encuestas/' . $uuid . '/responder'),
        ]);
        
        // Asociar las preguntas con la encuesta en la tabla intermedia
        $encuesta->preguntas()->sync($validated['preguntas']);                

        return redirect()->route('encuestas.generated', $encuesta->id)
                         ->with('success', 'Encuesta creada exitosamente.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $encuesta = Encuesta::find($id);

        return view('encuesta.show', compact('encuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $encuesta = Encuesta::find($id);
        $asignaturas = Asignatura::all();  // Obtener todas las asignaturas
        $preguntas = Pregunta::all();  // Obtener todas las preguntas
    
        return view('encuesta.edit', compact('encuesta', 'asignaturas', 'preguntas'));  // Pasar asignaturas y preguntas a la vista
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(EncuestaRequest $request, Encuesta $encuesta): RedirectResponse
    {
        $encuesta->update($request->validated());

        return Redirect::route('encuestas.index')
            ->with('success', 'Encuesta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Encuesta::find($id)->delete();

        return Redirect::route('encuestas.index')
            ->with('success', 'Encuesta deleted successfully');
    }

    public function generated($id)
    {
        $encuesta = Encuesta::find($id);

        return view('encuesta.generated', compact('encuesta'));
    }

    // Muestra la encuesta como formulario para que se respondan
    public function responder($uuid)
    {
        $encuesta = Encuesta::where('uuid', $uuid)->with('preguntas.opciones')->firstOrFail();

        return view('encuesta.answer', compact('encuesta'));
    }
    //-------Generacion de reportes de encuestas por fechas--------

    public function mostrarFormularioReportes()
{
    // Obtener todas las preguntas disponibles
    $preguntas = Pregunta::all();

    // Retornar la vista con las preguntas
    return view('encuesta.reportes', compact('preguntas'));
}

    public function generarReporte(Request $request)
{
    // Validamos el rango de fechas y la pregunta seleccionada
    $validated = $request->validate([
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        'pregunta' => 'nullable|string', // Puede ser "todas" o un ID de pregunta
    ]);

    // Convertimos las fechas
    $fecha_inicio = Carbon::parse($validated['fecha_inicio']);
    $fecha_fin = Carbon::parse($validated['fecha_fin'])->addDay(); // Incluir todo el día

    // Filtrar encuestas según el rol del usuario
    $encuestasQuery = Auth::user()->hasRole('admin')
        ? Encuesta::query()
        : Encuesta::where('creado_por', Auth::user()->docente->id ?? 0);

    // Agregamos el rango de fechas
    $encuestasQuery->whereBetween('created_at', [$fecha_inicio, $fecha_fin]);

    // Si se seleccionó una pregunta específica, filtramos
if ($request->pregunta !== 'todas') {
    $encuestasQuery->whereHas('preguntas', function ($query) use ($request) {
        $query->where('preguntas.id', $request->pregunta);
    });
}

// Obtenemos las encuestas con las relaciones necesarias
$encuestas = $encuestasQuery->with(['asignatura', 'preguntas.respuestas.opcion', 'docente.user'])->get();

// Filtrar las respuestas de la encuesta
$encuestasConRespuestas = $encuestas->map(function ($encuesta) use ($request) {
    $encuesta->preguntas = $encuesta->preguntas->filter(function ($pregunta) use ($request) {
        // Si se seleccionó "todas", no filtramos las preguntas
        if ($request->pregunta === 'todas') {
            return true;
        }

        // De lo contrario, filtramos por la pregunta específica seleccionada
        return $pregunta->id == $request->pregunta;
    });

    // Filtrar las respuestas relacionadas a la encuesta actual
    $encuesta->preguntas->each(function ($pregunta) use ($encuesta) {
        $pregunta->respuestas = $pregunta->respuestas->where('id_encuesta', $encuesta->id);

        // Contar las respuestas por opción
        $pregunta->recuento_respuestas = $pregunta->respuestas->groupBy('opcion.opcion')->map(function ($respuestasPorOpcion, $opcion) {
            return [
                'total' => $respuestasPorOpcion->count(),
                'detalles' => $respuestasPorOpcion->map(function ($respuesta) {
                    return [
                        'opcion' => $respuesta->opcion->opcion,
                        'fecha' => \Carbon\Carbon::parse($respuesta->fecha_respuesta)->format('d/m/Y'),
                    ];
                }),
            ];
        });
    });

    return $encuesta;
})->filter(function ($encuesta) {
    // Eliminar encuestas sin preguntas válidas
    return $encuesta->preguntas->isNotEmpty();
});

    return view('encuesta.reporte', compact('encuestasConRespuestas'));
}

}
