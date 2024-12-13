<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Encuesta Pregunta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Encuesta Pregunta') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">
                                Lista de relaciones entre encuestas y preguntas. 
                                <br>A continuación se presenta una lista de las pregunats presentes en cada encuesta

                            </p>
                        </div>                        
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>                                        
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Id Encuesta - Pregunta</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Id Encuesta</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Nombre de la Encuesta</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Id Pregunta</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Enunciado de la Pregunta </th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($encuestaPregunta as $encuestaPreguntum)
                                        <tr class="even:bg-gray-50">
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $encuestaPreguntum->id}}</td>


                                            <!-- Mostrar ID ENCUESTA y NOMBRE ENCUESTA solo cuando cambie el encuesta_id -->
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                @if ($loop->first || $encuestaPreguntum->encuesta_id != $encuestaPregunta[$loop->index - 1]->encuesta_id)
                                                    {{ $encuestaPreguntum->encuesta->id }}
                                                @else
                                                    &nbsp;
                                                @endif
                                            </td>

                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                @if ($loop->first || $encuestaPreguntum->encuesta_id != $encuestaPregunta[$loop->index - 1]->encuesta_id)
                                                    {{ $encuestaPreguntum->encuesta->nombre_encuesta }}
                                                @else
                                                    &nbsp;
                                                @endif
                                            </td>

                                            <!-- Siempre mostrar ID PREGUNTA y ENUNCIADO -->
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $encuestaPreguntum->pregunta_id}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $encuestaPreguntum->pregunta->enunciado ?? 'Sin Enunciado'}}</td>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                <form action="{{ route('encuesta-pregunta.destroy', $encuestaPreguntum->id) }}" method="POST">
                                                    <a href="{{ route('encuesta-pregunta.show', $encuestaPreguntum->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Mostrar') }}</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $encuestaPregunta->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>