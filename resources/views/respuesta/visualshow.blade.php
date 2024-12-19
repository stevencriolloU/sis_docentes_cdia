<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Respuestas de la Encuesta: {{ $encuesta->nombre_encuesta }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Resultados de la Encuesta: {{ $encuesta->nombre_encuesta }}</h3>

                @foreach ($encuesta->preguntas as $index => $pregunta)
                    <div class="mb-8">
                        <h4 class="text-lg font-semibold mb-4">{{ $pregunta->enunciado }}</h4>

                        <!-- Centrado de los elementos -->
                        <div class="flex justify-center gap-6 items-center">
                            <!-- Canvas más pequeño -->
                            <div class="flex-1 flex justify-center">
                                <canvas id="chart-{{ $pregunta->id }}" width="300" height="300"></canvas>
                            </div>

                            <!-- Cuadro con los votos -->
                            <div class="flex-1 pl-6 max-w-xs">
                                <div class="space-y-2">
                                <p>Recuento de votos</p>
                                    @foreach ($chartData[$index]['answers'] as $opcion => $votos)
                                        <div class="flex items-center">
                                            <!-- Color correspondiente al segmento con un ciclo de colores -->
                                            <div class="w-4 h-4 mr-2" style="background-color: {{ $chartColors[$loop->index % count($chartColors)] }};"></div>
                                            <!-- Texto con el conteo de votos -->
                                            <span class="text-gray-700">{{ $opcion }} = {{ $votos }} votos</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <a href="{{ route('encuestas.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                    Volver a Encuestas
                </a>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @foreach ($encuesta->preguntas as $index => $pregunta)
                const ctx{{ $pregunta->id }} = document.getElementById('chart-{{ $pregunta->id }}').getContext('2d');
                const chart{{ $pregunta->id }} = new Chart(ctx{{ $pregunta->id }}, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode(array_keys($chartData[$index]['answers'])) !!}, // Usamos las opciones como etiquetas
                        datasets: [{
                            label: 'Votos',
                            data: {!! json_encode(array_values($chartData[$index]['answers'])) !!}, // Usamos los recuentos como datos
                            backgroundColor: {!! json_encode($chartColors) !!},
                            borderColor: {!! json_encode($chartColors) !!},
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true, // Habilita el responsive del gráfico
                        maintainAspectRatio: false, // Permite el control del tamaño
                        scales: {
                            x: {
                                beginAtZero: true // Asegura que el eje X comience desde 0
                            },
                            y: {
                                beginAtZero: true // Asegura que el eje Y comience desde 0
                            }
                        }
                    }
                });
            @endforeach
        });
    </script>
</x-app-layout>
