<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Encuesta
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Definir Encuesta</h3>

                <form id="survey-form" action="{{ route('surveys.store') }}" method="POST">
                    @csrf

                    <!-- Preguntas por defecto -->
                    <div id="default-questions">
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Calificar del 1 al 5 la calidad del profesor</label>
                            <input type="hidden" name="questions[0][question]" value="Calificar del 1 al 5 la calidad del profesor">
                            <input type="hidden" name="questions[0][type]" value="rating">
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Califique del 1 al 5 el desarrollo de la clase</label>
                            <input type="hidden" name="questions[1][question]" value="Califique del 1 al 5 el desarrollo de la clase">
                            <input type="hidden" name="questions[1][type]" value="rating">
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">El profesor prendió la cámara (Sí o No)</label>
                            <input type="hidden" name="questions[2][question]" value="El profesor prendió la cámara (Sí o No)">
                            <input type="hidden" name="questions[2][type]" value="yes_no">
                        </div>
                    </div>

                    <!-- Contenedor para preguntas adicionales -->
                    <div id="additional-questions">
                        <h4 class="text-md font-bold mb-4">Preguntas adicionales</h4>
                    </div>

                    <!-- Botón para añadir preguntas -->
                    <button type="button" id="add-question" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Añadir Pregunta
                    </button>

                    <button type="submit" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Crear Encuesta
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let questionIndex = 3; // Comenzamos después de las preguntas por defecto

        document.getElementById('add-question').addEventListener('click', function () {
            const container = document.getElementById('additional-questions');

            const questionDiv = document.createElement('div');
            questionDiv.classList.add('mb-6');

            // Campo de texto para la pregunta
            const label = document.createElement('label');
            label.textContent = `Pregunta ${questionIndex + 1}`;
            label.classList.add('block', 'text-gray-700', 'font-semibold', 'mb-2');

            const input = document.createElement('input');
            input.type = 'text';
            input.name = `questions[${questionIndex}][question]`;
            input.required = true;
            input.classList.add('w-full', 'border', 'rounded', 'p-2', 'mb-2');

            // Selección del tipo de pregunta
            const select = document.createElement('select');
            select.name = `questions[${questionIndex}][type]`;
            select.classList.add('w-full', 'border', 'rounded', 'p-2');
            select.innerHTML = `
                <option value="rating">Calificación (1 a 5)</option>
                <option value="yes_no">Sí o No</option>
                <option value="multiple_choice">Opción Múltiple</option>
            `;

            // Agregar al contenedor
            questionDiv.appendChild(label);
            questionDiv.appendChild(input);
            questionDiv.appendChild(select);

            container.appendChild(questionDiv);

            questionIndex++;
        });
    </script>
</x-app-layout>
