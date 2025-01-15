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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reporte por fechas de las encuestas') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @if ($encuestasConRespuestas->isEmpty())
                        <!-- Mensaje cuando no hay encuestas en el rango de fechas -->
                        <div class="text-center p-6 bg-yellow-100 border border-yellow-300 rounded-lg">
                            <p class="text-lg text-yellow-700 font-semibold">No tienes encuestas en este rango de fechas.</p>
                        </div>
                    @else
                        <div class="w-full">
                            @foreach ($encuestasConRespuestas as $encuesta)
                                <div class="mb-8">
                                    <!-- Detalles de la Encuesta -->
                                    <div class="mb-4">
                                        <p class="text-lg text-gray-900"><span class="font-semibold">Nombre de la Asignatura:</span> <span class="font-normal">{{ $encuesta->asignatura->nombre_asignatura ?? 'N/A' }}</span></p>
                                        <p class="text-lg text-gray-900"><span class="font-semibold">Nombre Encuesta:</span> <span class="font-normal">{{ $encuesta->nombre_encuesta }}</span></p>
                                        <p class="text-lg text-gray-900"><span class="font-semibold">Fecha Creación:</span> <span class="font-normal">{{ \Carbon\Carbon::parse($encuesta->created_at)->format('d/m/Y') }}</span></p>
                                        <p class="text-lg text-gray-900"><span class="font-semibold">Creado Por:</span> <span class="font-normal">{{ $encuesta->docente->user->name ?? 'N/A' }}</span></p>
                                        <p class="text-lg text-gray-900"><span class="font-semibold">Enlace Encuesta:</span> <span class="font-normal text-blue-600"><a href="{{ route('encuestas.responder', $encuesta->uuid) }}" target="_blank">{{ route('encuestas.responder', $encuesta->uuid) }}</a></span></p>
                                        <p class="text-lg text-gray-900"><span class="font-semibold">Ver Registro:</span> <span class="font-normal text-blue-600"><a href="{{ route('encuestas.show', $encuesta->id) }}" target="_blank">{{ route('encuestas.show', $encuesta->id) }}</a></span></p>
                                    </div>

                                    <!-- Tabla de Preguntas y Respuestas -->
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Pregunta</th>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Respuestas</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @foreach ($encuesta->preguntas as $pregunta)
                                                <tr>
                                                    <td class="px-3 py-4 text-sm text-gray-500">{{ $pregunta->enunciado }}</td>
                                                    <td class="px-3 py-4 text-sm text-gray-500">
                                                        <ul class="list-disc pl-6">
                                                            @foreach($pregunta->respuestas as $respuesta)
                                                                <li>
                                                                    {{ $respuesta->opcion->opcion }}
                                                                    <span class="text-gray-400 text-xs">({{ \Carbon\Carbon::parse($respuesta->fecha_respuesta)->format('d/m/Y') }})</span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-app-layout>

</html>