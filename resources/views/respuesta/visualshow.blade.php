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
    </head>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="text-white text-center font-semibold text-xl leading-tight">
                Respuestas de la Encuesta: {{ $encuesta->nombre_encuesta }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="bg-white shadow-xl sm:rounded-lg p-8 border-t-4 border-blue-500">
                    <div class="bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center">
                            <div class="flex items-center justify-between sm:flex-auto">
                                <h1 class="mt-2 font-semibold text-white">Resultados de la Encuesta</h1>
                                <img src="{{ asset('images/graficos.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 ml-4">
                            </div>
                        </div>

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

                    <a href="{{ route('encuestas.index') }}" 
                        class="flex justify-center mt-4 bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                        <img src="{{ asset('images/Regresar.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
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
</html>