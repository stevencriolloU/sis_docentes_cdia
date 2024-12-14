@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reporte de Conexiones de Estudiantes</h1>

    <form id="filtro-reporte">
        <div class="row">
            <div class="col-md-4">
                <label for="docente_id">Docente</label>
                <select name="docente_id" id="docente_id" class="form-control">
                    @foreach ($docentes as $docente)
                        <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="fecha_inicio">Fecha Inicio</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="fecha_fin">Fecha Fin</label>
                <input type="date" id="fecha_fin" name="fecha_fin" class="form-control">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" id="filtrar" class="btn btn-primary">Generar</button>
            </div>
        </div>
    </form>

    <canvas id="graficoConexionesEstudiantes" class="mt-5"></canvas>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.getElementById('filtrar').addEventListener('click', function() {
        const docente_id = document.getElementById('docente_id').value;
        const fecha_inicio = document.getElementById('fecha_inicio').value;
        const fecha_fin = document.getElementById('fecha_fin').value;

        fetch(`/reporte/estudiantes/conexiones?docente_id=${docente_id}&fecha_inicio=${fecha_inicio}&fecha_fin=${fecha_fin}`)
            .then(response => response.json())
            .then(data => {
                const fechas = data.map(item => item.fecha);
                const totales = data.map(item => item.total);

                const ctx = document.getElementById('graficoConexionesEstudiantes').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: fechas,
                        datasets: [{
                            label: 'Conexiones de Estudiantes',
                            data: totales,
                            borderColor: 'rgba(153, 102, 255, 1)',
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        }]
                    },
                });
            });
    });
</script>
@endsection
@endsection
