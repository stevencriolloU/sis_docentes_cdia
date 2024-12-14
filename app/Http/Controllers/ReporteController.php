<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conexion;
use App\Models\Novedad;
use App\Models\Respuesta;

class ReporteController extends Controller
{
    // Reporte de conexiones del docente por rango de fechas
    public function conexionesDocente(Request $request)
    {
        $validated = $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $conexiones = Conexion::selectRaw('DATE(created_at) as fecha, COUNT(*) as total')
            ->where('docente_id', $validated['docente_id'])
            ->whereBetween('created_at', [$validated['fecha_inicio'], $validated['fecha_fin']])
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        return response()->json($conexiones);
    }

    // Reporte de novedades de asistencia del docente
    public function novedadesDocente(Request $request)
    {
        $validated = $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $novedades = Novedad::selectRaw('DATE(created_at) as fecha, 
                    SUM(asistencia_normal) as normal, 
                    SUM(temas_abordados) as temas')
            ->where('docente_id', $validated['docente_id'])
            ->whereBetween('created_at', [$validated['fecha_inicio'], $validated['fecha_fin']])
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        return response()->json($novedades);
    }

    // Reporte de conexiones de estudiantes por rango de fechas y docente
    public function conexionesEstudiantes(Request $request)
    {
        $validated = $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $conexiones = Respuesta::selectRaw('DATE(created_at) as fecha, COUNT(*) as total')
            ->whereHas('encuesta', function ($query) use ($validated) {
                $query->where('docente_id', $validated['docente_id']);
            })
            ->whereBetween('created_at', [$validated['fecha_inicio'], $validated['fecha_fin']])
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        return response()->json($conexiones);
    }
}
