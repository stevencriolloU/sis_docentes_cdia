<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Encuesta Creada
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">¡Tu encuesta ha sido creada!</h3>
                    <p>Comparte este enlace con tus estudiantes para que respondan la encuesta:</p>
                    <div class="mt-4 bg-gray-100 p-4 rounded-md">
                        <a href="{{ url('/surveys/' . $survey->uuid) }}" 
                           class="text-blue-600 underline">
                            {{ url('/surveys/' . $survey->uuid) }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
