<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Respuestas de la Encuesta: {{ $encuesta->nombre_encuesta }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-8 border-t-4 border-blue-500">
                <h3 class="text-2xl font-bold mb-6 text-blue-600">Resultados de la Encuesta</h3>

                @foreach ($encuesta->preguntas as $index => $pregunta)
                    <div class="mb-12 bg-gray-100 p-6 rounded-lg shadow-md">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4">{{ $pregunta->enunciado }}</h4>

                        <!-- Contenedor con los elementos centrados -->
                        <div class="flex justify-center gap-6 items-center">
                            <!-- Canvas de gráfico -->
                            <div class="flex-1 flex justify-center bg-gray-50 p-4 rounded-lg shadow-md">
                                <canvas id="chart-{{ $pregunta->id }}" width="300" height="300"></canvas>
                            </div>

                            <!-- Cuadro con los votos -->
                            <div class="flex-1 pl-8 max-w-xs pr-4">
                                <div class="space-y-4">
                                    <p class="text-lg font-medium text-gray-700">Recuento de votos</p>
                                    @foreach ($chartData[$index]['answers'] as $opcion => $votos)
                                        <div class="flex items-center space-x-2">
                                            <!-- Color de segmento -->
                                            <div class="w-5 h-5 rounded-full" style="background-color: {{ $chartColors[$loop->index % count($chartColors)] }};"></div>
                                            <!-- Texto con votos -->
                                            <span class="text-gray-600 text-sm font-medium">{{ $opcion }} = <span class="text-gray-800 font-bold">{{ $votos }}</span> votos</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <a href="{{ route('encuestas.index') }}" class="block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Volver a las encuestas
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
                        labels: {!! json_encode(array_keys($chartData[$index]['answers'])) !!}, // Opciones como etiquetas
                        datasets: [{
                            label: 'Votos',
                            data: {!! json_encode(array_values($chartData[$index]['answers'])) !!}, // Recuento de votos
                            backgroundColor: {!! json_encode($chartColors) !!},
                            borderColor: {!! json_encode($chartColors) !!},
                            borderWidth: 1,
                            borderRadius: 5 // Bordes redondeados
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                beginAtZero: true,
                                ticks: {
                                    font: {
                                        size: 14
                                    }
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    font: {
                                        size: 14
                                    }
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false // Desactivar la leyenda si no es necesaria
                            }
                        }
                    }
                });
            @endforeach
        });
    </script>
</x-app-layout>
