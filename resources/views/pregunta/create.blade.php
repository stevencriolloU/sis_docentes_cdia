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
                {{ __('Crear') }} Pregunta
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center">
                            <div class="flex items-center justify-between sm:flex-auto">
                                <h1 class="mt-2 font-semibold text-white">Agrega una nueva {{ __('Pregunta') }} </h1>
                                <img src="{{ asset('images/añadir.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 ml-4">
                            </div>
                        </div>

                        <div class="flow-root">
                            <div class="mt-8 overflow-x-auto">
                                <div class="max-w-xl py-2 align-middle mx-auto">
                                    <form method="POST" action="{{ route('preguntas.store') }}" role="form" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Enunciado -->
                                        <div class="mb-4">
                                            <label for="enunciado" class="block text-sm font-medium text-gray-700">
                                                {{ __('Enunciado') }}
                                            </label>
                                            <input type="text" id="enunciado" name="enunciado" value="{{ old('enunciado') }}" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Escribe el enunciado aquí" required>
                                            @error('enunciado')
                                                <span class="text-sm text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Tipo de pregunta -->
                                        <div class="mb-4">
                                            <label for="tipo_pregunta" class="block text-sm font-medium text-gray-700">
                                                {{ __('Tipo de Pregunta') }}
                                            </label>
                                            <select id="tipo_pregunta" name="tipo_pregunta" class="form-select rounded-md shadow-sm mt-1 block w-full" required onchange="toggleEscala(this.value)">
                                                <option value="texto_libre" {{ old('tipo_pregunta') === 'texto_libre' ? 'selected' : '' }}>
                                                    {{ __('Texto Libre') }}
                                                </option>
                                                <option value="seleccion_simple" {{ old('tipo_pregunta') === 'seleccion_simple' ? 'selected' : '' }}>
                                                    {{ __('Selección Simple') }}
                                                </option>
                                                <option value="seleccion_multiple" {{ old('tipo_pregunta') === 'seleccion_multiple' ? 'selected' : '' }}>
                                                    {{ __('Selección Múltiple') }}
                                                </option>
                                            </select>
                                            @error('tipo_pregunta')
                                                <span class="text-sm text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Escala -->
                                        <div class="mb-4" id="escala-section">
                                            <label for="escala" class="block text-sm font-medium text-gray-700">
                                                {{ __('Escala') }}
                                            </label>
                                            <select id="escala" name="escala" class="form-select rounded-md shadow-sm mt-1 block w-full">
                                                <option value="" {{ old('escala') === '' ? 'selected' : '' }}>
                                                    {{ __('Seleccione') }}
                                                </option>
                                                <option value="rango" {{ old('escala') === 'rango' ? 'selected' : '' }}>
                                                    {{ __('Rango') }}
                                                </option>
                                                <option value="likert" {{ old('escala') === 'likert' ? 'selected' : '' }}>
                                                    {{ __('Likert') }}
                                                </option>
                                                <option value="si_no" {{ old('escala') === 'si_no' ? 'selected' : '' }}>
                                                    {{ __('Sí/No') }}
                                                </option>
                                            </select>
                                            @error('escala')
                                                <span class="text-sm text-red-600">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Botón de crear -->
                                        <div class="mt-6 flex justify-end">
                                            <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-white font-semibold hover:bg-indigo-500 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600">
                                                {{ __('Crear Pregunta') }}
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Script -->
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            toggleEscala(document.getElementById('tipo_pregunta').value);
                                        });

                                        function toggleEscala(tipoPregunta) {
                                            const escalaSection = document.getElementById('escala-section');
                                            if (tipoPregunta === 'texto_libre') {
                                                escalaSection.style.display = 'none';
                                            } else {
                                                escalaSection.style.display = 'block';
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</html>
