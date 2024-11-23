<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Responder Encuesta</h2>
    </x-slot>

    <form action="{{ route('survey.respond', $survey->uuid) }}" method="POST" class="max-w-4xl mx-auto mt-6">
        @csrf
        @foreach (json_decode($survey->questions) as $index => $question)
            <div class="mb-4">
                <label for="question{{ $index }}" class="block text-sm font-medium text-gray-700">{{ $question }}</label>
                <input type="text" name="answers[]" id="question{{ $index }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
        @endforeach
        <button type="submit" class="mt-5 px-4 py-2 bg-blue-500 text-white rounded">Enviar Respuestas</button>
    </form>
</x-app-layout>
