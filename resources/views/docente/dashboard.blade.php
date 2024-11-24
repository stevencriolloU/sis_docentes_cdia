<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-800">Bienvenido, DOCENTE</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tarjeta de bienvenida -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                <x-welcome/>                
            </div>

            <!-- Tarjetas de acción -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Crear Encuesta -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">Crear Encuesta</h3>
                        <p class="mt-2 text-gray-600">Diseña y crea nuevas encuestas para tus estudiantes de manera fácil y rápida.</p>
                        <a href="{{ route('surveys.create') }}" 
                            class="mt-4 inline-block px-6 py-2 bg-indigo-600 text-white text-center rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 transition duration-200">
                            Crear Nueva Encuesta
                        </a>
                    </div>
                </div>

                <!-- Ver Mis Encuestas -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">Ver Mis Encuestas</h3>
                        <p class="mt-2 text-gray-600">Accede a las encuestas que ya has creado y realiza modificaciones si es necesario.</p>
                        <a href="#" 
                            class="mt-4 inline-block px-6 py-2 bg-green-600 text-white text-center rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 transition duration-200">
                            Ver Encuestas
                        </a>
                    </div>
                </div>

                <!-- Ver Resultados -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">Ver Resultados</h3>
                        <p class="mt-2 text-gray-600">Accede a los resultados de las encuestas que ya has creado.</p>
                        <a href="#" 
                            class="mt-4 inline-block px-6 py-2 bg-cyan-600 text-white text-center rounded-md hover:bg-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-600 focus:ring-offset-2 transition duration-200">
                            Ver Resultados
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
