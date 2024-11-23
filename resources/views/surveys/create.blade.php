<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Encuesta</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <form action="{{ route('surveys.store') }}" method="POST">
            @csrf
            <h3 class="text-lg font-bold">Preguntas:</h3>
            <ol class="list-disc pl-5">
                <li>Califique del 1 al 5 la calidad del profesor.</li>
                <li>Califique del 1 al 5 el desarrollo de la clase.</li>
                <li>¿El profesor encendió la cámara? (Sí/No).</li>
                <li>¿Tuvo problemas técnicos durante la clase? (Sí/No).</li>
                <li>¿Recomendaría esta clase a otros estudiantes? (Sí/No).</li>
            </ol>
            <button type="submit" class="mt-5 px-4 py-2 bg-blue-500 text-white rounded">Crear Encuesta</button>
        </form>
    </div>
</x-app-layout>
