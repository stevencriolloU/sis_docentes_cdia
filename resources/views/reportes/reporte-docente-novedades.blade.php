@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reporte de Novedades del Docente</h1>

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

    <canvas id="graficoNovedades" class="mt-5"></canvas>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.getElementById('filtrar').addEventListener('click', function() {
        const docente_id = document.getElementById('docente_id').value;
        const fecha_inicio = document.getElementById('fecha_inicio').value;
        const fecha_fin = document.getElementById('fecha_fin').value;

        fetch(`/reporte/docente/novedades?docente_id=${docente_id}&fecha_inicio=${fecha_inicio}&fecha_fin=${fecha_fin}`)
            .then(response => response.json())
            .then(data => {
                const fechas = data.map(item => item.fecha);
                const normales = data.map(item => item.normal);
                const temas = data.map(item => item.temas);

                const ctx = document.getElementById('graficoNovedades').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: fechas,
                        datasets: [
                            {
                                label: 'Asistencia Normal',
                                data: normales,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1,
                            },
                            {
                                label: 'Temas Abordados',
                                data: temas,
                                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                                borderColor: 'rgba(255, 206, 86, 1)',
                                borderWidth: 1,
                            }
                        ]
                    },
                });
            });
    });
</script>
@endsection
@endsection
