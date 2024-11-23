<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Responder Encuesta
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Encuesta sobre la clase</h3>

                <form action="{{ route('survey.respond', $survey->uuid) }}" method="POST">
                    @csrf

                    @foreach($survey->questions as $index => $question)
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">{{ $question['question'] }}</label>

                            @if($question['type'] === 'rating')
                                <!-- Opciones de 1 a 5 para preguntas de calificación -->
                                <div class="flex space-x-4">
                                    @for($i = 1; $i <= 5; $i++)
                                        <div class="flex items-center">
                                            <input type="radio" id="question_{{ $index }}_{{ $i }}" name="responses[{{ $index }}]" value="{{ $i }}" class="form-radio text-blue-500" required>
                                            <label for="question_{{ $index }}_{{ $i }}" class="ml-2">{{ $i }}</label>
                                        </div>
                                    @endfor
                                </div>
                            @elseif($question['type'] === 'yes_no')
                                <!-- Pregunta de sí/no -->
                                <div class="flex space-x-4">
                                    <div class="flex items-center">
                                        <input type="radio" id="question_{{ $index }}_yes" name="responses[{{ $index }}]" value="Sí" class="form-radio text-blue-500" required>
                                        <label for="question_{{ $index }}_yes" class="ml-2">Sí</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" id="question_{{ $index }}_no" name="responses[{{ $index }}]" value="No" class="form-radio text-blue-500" required>
                                        <label for="question_{{ $index }}_no" class="ml-2">No</label>
                                    </div>
                                </div>
                            @elseif($question['type'] === 'multiple_choice')
                                <!-- Pregunta de opción múltiple (si aplica) -->
                                @foreach($question['options'] as $option)
                                    <div class="flex items-center">
                                        <input type="radio" id="question_{{ $index }}_{{ $loop->index }}" name="responses[{{ $index }}]" value="{{ $option }}" class="form-radio text-blue-500" required>
                                        <label for="question_{{ $index }}_{{ $loop->index }}" class="ml-2">{{ $option }}</label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @endforeach

                    <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                        Enviar Encuesta
                    </button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
