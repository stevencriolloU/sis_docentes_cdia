<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-white leading-tight">
            Encuesta {{ $encuesta->nombre_encuesta }}
            creada por {{ $encuesta->docente->user->name ?? 'N/A' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-3xl font-bold text-white mb-6 text-center">{{ $encuesta->nombre_encuesta }}</h1>

                <form method="POST" action="{{ route('respuestas.store', $encuesta->uuid) }}">
                    @csrf

                    @foreach ($encuesta->preguntas as $pregunta)
                        <div class="my-6 p-4 bg-gray-600 rounded-lg">
                            <h3 class="font-semibold text-lg text-white">{{ $pregunta->enunciado }}</h3>

                            @foreach ($pregunta->opciones as $opcion)
                                <div class="flex items-center mt-3">
                                    <input type="radio" id="opcion_{{ $opcion->id }}" name="preguntas[{{ $pregunta->id }}]" value="{{ $opcion->id }}" class="mr-2" required>
                                    <label for="opcion_{{ $opcion->id }}" class="text-white text-sm">{{ $opcion->opcion }}</label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    <div class="mt-6 flex justify-center">
                        <x-button class="w-full py-3 bg-indigo-600 text-white font-bold text-lg rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Enviar Respuestas
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
