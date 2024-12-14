<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reporte de Conexiones del Docente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-2xl font-semibold leading-6 text-gray-900">{{ __('Reporte de Conexiones del Docente') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">Genera el reporte de conexiones de los docentes por un rango de fechas.</p>
                        </div>
                    </div>

                    <form id="filtro-reporte" class="mt-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white p-4 border border-gray-300 rounded-lg shadow-sm">
                                <label for="docente_id" class="block text-sm font-semibold text-gray-900 mb-2">Docente</label>
                                <select name="docente_id" id="docente_id" class="form-control block w-full border-gray-300 rounded-md shadow-sm">
                                    @foreach ($docentes as $docente)
                                        <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="bg-white p-4 border border-gray-300 rounded-lg shadow-sm">
                                <label for="fecha_inicio" class="block text-sm font-semibold text-gray-900 mb-2">Fecha Inicio</label>
                                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div class="bg-white p-4 border border-gray-300 rounded-lg shadow-sm">
                                <label for="fecha_fin" class="block text-sm font-semibold text-gray-900 mb-2">Fecha Fin</label>
                                <input type="date" id="fecha_fin" name="fecha_fin" class="form-control block w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div class="flex items-end justify-end">
                                <button type="button" id="filtrar" class="btn btn-primary bg-indigo-600 text-white hover:bg-indigo-500 px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    Generar
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="mt-8">
                        <canvas id="graficoConexiones"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.getElementById('filtrar').addEventListener('click', function() {
                const docente_id = document.getElementById('docente_id').value;
                const fecha_inicio = document.getElementById('fecha_inicio').value;
                const fecha_fin = document.getElementById('fecha_fin').value;

                fetch(`/reporte/docente/conexiones?docente_id=${docente_id}&fecha_inicio=${fecha_inicio}&fecha_fin=${fecha_fin}`)
                    .then(response => response.json())
                    .then(data => {
                        const fechas = data.map(item => item.fecha);
                        const totales = data.map(item => item.total);

                        const ctx = document.getElementById('graficoConexiones').getContext('2d');
                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: fechas,
                                datasets: [{
                                    label: 'Conexiones por Día',
                                    data: totales,
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                }]
                            },
                        });
                    });
            });
        </script>
    </x-slot>

</x-app-layout>
