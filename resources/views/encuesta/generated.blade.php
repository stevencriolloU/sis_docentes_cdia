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
            <h2 class="font-semibold text-xl text-center text-white leading-tight">
                Encuesta Creada
            </h2>
        </x-slot>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-500 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg text-white font-semibold mb-4 text-center">¡Tu encuesta ha sido creada!</h3>
                        <p class="text-center text-white">Comparte este enlace con tus estudiantes para que respondan la encuesta:</p>
                        <div class="mt-4 bg-gray-200 p-4 rounded-md flex justify-between items-center">
                            <a href="{{ $encuesta->enlace_encuesta }}" id="survey-link" 
                            class="text-blue-600 underline flex-1 mr-4">
                                {{ $encuesta->enlace_encuesta }}
                            </a>
                            <!-- Botón para copiar la URL -->
                            <button id="copy-button" 
                                class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                <img src="{{ asset('images/copiar.svg') }}" alt="Icono de inicio de sesión" class="h-4 w-4 mr-2">
                                Copiar
                            </button>
                            
                        </div>

                        <div class="flex items-center justify-center py-4">
                            <a href="{{ route('welcome') }}" 
                                class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md transition-all duration-300">
                                <img src="{{ asset('images/Regresar.svg') }}" alt="Icono de registro" class="h-5 w-5 mr-2">
                                Regresar al inicio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('copy-button').addEventListener('click', function() {
                const url = document.getElementById('survey-link').textContent;
                navigator.clipboard.writeText(url).then(function() {
                    alert('URL copiada al portapapeles');
                }).catch(function(error) {
                    alert('Error al copiar la URL: ' + error);
                });
            });
        </script>
    </x-app-layout>

</html>