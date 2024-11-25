<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Respuestas de la Encuesta
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Resultados de la Encuesta: {{ $survey->title }}</h3>

                @foreach ($questions as $index => $question)
                    <div class="mb-8">
                        <label class="block text-gray-700 font-semibold mb-2">{{ $index + 1 }}. {{ $question['question'] }}</label>

                        <div class="space-y-2">
                            @foreach ($responses as $response)
                                <div class="flex items-center p-4 bg-gray-50 border border-gray-200 rounded-md shadow-sm">
                                    <span class="text-gray-600">{{ $response[$index] ?? 'No respondida' }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <a href="{{ route('surveys.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                    Volver a Encuestas
                </a>
            </div>
        </div>
    </div>

</x-app-layout>
