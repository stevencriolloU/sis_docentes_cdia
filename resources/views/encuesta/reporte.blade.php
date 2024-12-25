<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reporte por fechas de las encuestas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
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
            </div>
        </div>
    </div>
</x-app-layout>
