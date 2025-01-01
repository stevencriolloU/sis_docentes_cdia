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
                {{ __('Actualizar Docente') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center">
                            <div class="flex items-center justify-between sm:flex-auto">
                                <h1 class="mt-2 font-semibold text-white">Modifica los datos del docente</h1>
                                <img src="{{ asset('images/editar.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 ml-4">
                            </div>
                        </div>

                        <div class="flow-root">
                            <div class="overflow-x-auto">
                                <div class="mt-4 max-w-xl py-2 align-middle mx-auto">
                                    <form method="POST" action="{{ route('docentes.update', $docente->id) }}" role="form" enctype="multipart/form-data">
                                        {{ method_field('PATCH') }}
                                        @csrf
                                        
                                        <!-- Campo Nombre del Usuario -->
                                        <div class="mb-4">
                                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Nombre del Usuario') }}</label>
                                            <input type="text" id="name" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $docente->user->name }}" Disabled>
                                        </div>

                                        <!-- Campo Contrato -->
                                        <div class="mb-4">
                                            <label for="contrato" class="block text-sm font-medium text-gray-700">{{ __('Contrato') }}</label>
                                            <input type="text" id="contrato" name="contrato" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ $docente->contrato }}">
                                        </div>

                                        <!-- Botón para actualizar -->
                                        <div class="flex items-center justify-center">
                                            <button type="submit" 
                                                class="flex justify-center mt-4 bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                                <img src="{{ asset('images/guardar.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                                {{ __('Guardar') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</html>