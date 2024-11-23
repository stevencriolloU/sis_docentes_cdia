<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Encuesta
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Preguntas de la Encuesta</h3>
                    <ul class="list-disc pl-5 mb-6">
                        <li>Califique del 1 al 5 la calidad del profesor.</li>
                        <li>Califique del 1 al 5 el desarrollo de la clase.</li>
                        <li>¿El profesor prendió la cámara? (Sí/No)</li>
                        <li>¿La clase se dio en el horario establecido? (Sí/No)</li>
                        <li>¿El contenido fue claro y comprensible? (Sí/No)</li>
                    </ul>

                    <form method="POST" action="{{ route('surveys.store') }}">
                        @csrf
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Crear Encuesta
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
