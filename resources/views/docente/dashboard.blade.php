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
            <h1 class="text-white text-center font-semibold text-xl leading-tight">Bienvenido, Docente</h1>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                    <x-welcome/>                
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
                    
                    <!-- Crear Encuesta -->
                    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-white text-center">Crear Encuesta</h3>
                            <p class="mt-2 text-white text-center">Diseña y crea nuevas encuestas para tus estudiantes de manera fácil y rápida.</p>
                            <a href="{{ route('encuestas.create') }}" 
                                class="mt-4 justify-center flex text-center bg-gray-500 hover:bg-indigo-600 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                <img src="{{ asset('images/añadir.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                Crear Nueva Encuesta
                            </a>
                        </div>
                    </div>

                    <!-- Ver Mis Encuestas -->
                    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-white text-center">Ver Mis Encuestas</h3>
                            <p class="mt-2 text-white text-center">Accede a las encuestas que ya has creado. Accede a los resultados de las encuestas que ya has creado.</p>
                            <a href="{{ route('encuestas.index') }}" 
                                class="mt-4 justify-center flex text-center bg-gray-500 hover:bg-green-500 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                <img src="{{ asset('images/mostrar.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                Ver Encuestas
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </x-app-layout>

</html>