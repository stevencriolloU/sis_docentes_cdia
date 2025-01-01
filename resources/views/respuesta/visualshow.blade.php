<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" type="image/png">

        <title>SISTEMA DE SEGUIMIENTO DOCENTE</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                @import url('https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css');
            </style>
        @endif

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const errorMessage = "{{ session('error') }}";
                if (errorMessage) {
                    alert(errorMessage);
                }
            });
        </script>
    </head>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-center text-white leading-tight">
                Respuestas de la Encuesta: {{ $encuesta->nombre_encuesta }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center">
                        <div class="flex items-center justify-between sm:flex-auto">
                            <h1 class="mt-2 font-semibold text-white">Estadistica de la Encuesta: {{ $encuesta->nombre_encuesta }}</h1>
                            <img src="{{ asset('images/encuestas.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 ml-4">
                        </div>
                    </div>

                    @foreach ($encuesta->preguntas as $index => $pregunta)
                        <div class="mb-8 mt-4 text-center">
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

                    <a href="{{ route('encuestas.index') }}" 
                        class="flex justify-center mt-4 bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                        <img src="{{ asset('images/Regresar.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
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
                        type: 'bar', // Cambiado a gráfico de barras
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
                            responsive: true, // Habilita la responsividad
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

</html>