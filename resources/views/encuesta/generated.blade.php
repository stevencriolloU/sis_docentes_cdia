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
                    <div class="mt-4 bg-gray-100 p-4 rounded-md flex justify-between items-center">
                        <a href="{{ $encuesta->enlace_encuesta }}" id="survey-link" 
                           class="text-blue-600 underline flex-1 mr-4">
                            {{ $encuesta->enlace_encuesta }}
                        </a>
                        <!-- Botón para copiar la URL -->
                        <button id="copy-button" 
                                class="ml-4 text-white bg-indigo-600 px-4 py-2 rounded-md hover:bg-indigo-500 focus:outline-none">
                            Copiar
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('copy-button').addEventListener('click', function() {
            const url = document.getElementById('survey-link').textContent;
            navigator.clipboard.writeText(url).then(function() {
                alert('URL copiada al portapapeles');
            }).catch(function(error) {
                alert('Error al copiar la URL: ' + error);
            });
        });
    </script>
</x-app-layout>
