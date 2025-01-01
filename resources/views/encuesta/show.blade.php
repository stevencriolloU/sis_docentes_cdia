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
                {{ $encuesta->nombre_encuesta ?? __('Mostrar') . " " . __('Encuesta') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center">
                            <div class="flex items-center justify-between sm:flex-auto">
                                <h1 class="mt-2 font-semibold text-white">Detalles de {{ __('Encuesta') }}</h1>
                                <img src="{{ asset('images/mostrar.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 ml-4">
                            </div>
                        </div>

                        <div class="flow-root">
                            <div class="overflow-x-auto text-center">
                                <div class="inline-block py-2 align-middle">
                                    <div class="border-t border-gray-100">
                                        <dl class="divide-y divide-gray-100">
                                            
                                            <!-- Id Asignatura -->
                                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                <dt class="text-sm font-medium leading-6 text-gray-900">Nombre de la Asignatura</dt>
                                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $encuesta->asignatura->nombre_asignatura ?? 'N/A' }}</dd>
                                            </div>
                                            
                                            <!-- Nombre Encuesta -->
                                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                <dt class="text-sm font-medium leading-6 text-gray-900">Nombre Encuesta</dt>
                                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $encuesta->nombre_encuesta }}</dd>
                                            </div>

                                            <!-- Fecha de Creación -->
                                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                <dt class="text-sm font-medium leading-6 text-gray-900">Fecha Creacion</dt>
                                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $encuesta->fecha_creacion }}</dd>
                                            </div>

                                            <!-- Creado Por -->
                                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                <dt class="text-sm font-medium leading-6 text-gray-900">Creado Por</dt>
                                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $encuesta->docente->user->name ?? 'N/A' }}</dd>
                                            </div>

                                            <!-- Enlace Encuesta -->
                                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                                <dt class="text-sm font-medium leading-6 text-gray-900">Enlace Encuesta</dt>
                                                <dd class="mt-2 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $encuesta->enlace_encuesta }}</dd>
                                            </div>

                                        </dl>
                                    </div>

                                    <a type="button" href="{{ route('respuestas.show', $encuesta->id) }}" 
                                        class="flex justify-center mt-4 bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                        <img src="{{ asset('images/respuesta.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                        Ver Respuestas
                                    </a>

                                    <a type="button" href="{{ route('respuestas.visualshow', $encuesta->id) }}" 
                                        class="flex justify-center mt-4 bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                        <img src="{{ asset('images/graficos.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                        Respuestas con Graficos
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</html>