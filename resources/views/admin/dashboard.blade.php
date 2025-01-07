<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenido, Admin
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Bloque 1: Gestionar Roles -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Gestionar roles</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-semibold mb-4">Gestionar roles</h3>
                        <p class="text-gray-600 mb-4">Administra los roles y permisos asignados a los usuarios.</p>
                        <a href="{{ route('admin.users.index') }}"
                            class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 transition-all duration-300">
                            Gestionar roles
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bloque 2: Cursos, Docentes y Asignaturas -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Lista de cursos, docentes y asignaturas</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Tarjeta 2: Cursos -->
                    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-semibold mb-4">Lista de cursos</h3>
                        <p class="text-gray-600 mb-4">Consulta y administra todos los cursos disponibles.</p>
                        <a href="{{ route('cursos.index') }}" class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 transition-all duration-300">Ver cursos</a>
                    </div>
                    <!-- Tarjeta 3: Docentes -->
                    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-semibold mb-4">Docentes</h3>
                        <p class="text-gray-600 mb-4">Gestiona la información de los docentes en el sistema.</p>
                        <a href="{{ route('docentes.index') }}" class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 transition-all duration-300">Ver docentes</a>
                    </div>
                    <!-- Tarjeta 4: Asignaturas -->
                    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-semibold mb-4">Asignaturas</h3>
                        <p class="text-gray-600 mb-4">Consulta todas las asignaturas asignadas a los docentes.</p>
                        <a href="{{ route('asignaturas.index') }}" class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 transition-all duration-300">Ver asignaturas</a>
                    </div>
                </div>
            </div>

            <!-- Bloque 3: Encuestas -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Encuestas de los docentes</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Tarjeta 5: Encuestas -->
                    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-semibold mb-4">Encuestas de los docentes</h3>
                        <p class="text-gray-600 mb-4">Administra y consulta todas las encuestas del sistema.</p>
                        <a href="{{ route('encuestas.index') }}" class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 transition-all duration-300">Ver encuestas</a>
                    </div>
                </div>
            </div>

            <!-- Bloque 3.2: Encuestas -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Reporte de los docentes</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Tarjeta 5.2: Encuestas -->
                    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-semibold mb-4">Reportes</h3>
                        <p class="text-gray-600 mb-4">Administra y consulta los reportes del sistema.</p>
                        <a href="{{ route('reportes.form') }}" class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 transition-all duration-300">Ver reportes</a>
                    </div>
                </div>
            </div>

            <!-- Bloque 4: Preguntas y Opciones -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Preguntas y opciones</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Tarjeta 6: Preguntas -->
                    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-semibold mb-4">Preguntas</h3>
                        <p class="text-gray-600 mb-4">Administra y crea las preguntas del sistema.</p>
                        <a href="{{ route('preguntas.index') }}" class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 transition-all duration-300">Ver preguntas</a>
                    </div>
                    <!-- Tarjeta 8: Opciones -->
                    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-semibold mb-4">Opciones de respuesta</h3>
                        <p class="text-gray-600 mb-4">Gestiona de forma general las opciones de respuesta.</p>
                        <a href="{{ route('opciones.index') }}" class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 transition-all duration-300">Ver opciones</a>
                    </div>
                    <!-- Tarjeta 9: Pregunta-Opción -->
                    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-semibold mb-4">Asignar opciones a preguntas</h3>
                        <p class="text-gray-600 mb-4">Asocia opciones específicas a preguntas.</p>
                        <a href="{{ route('pregunta-opcions.index') }}" class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 transition-all duration-300">Asignar opciones</a>
                    </div>
                </div>
            </div>

            <!-- Bloque 5: Lista de Preguntas y Respuestas -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Lista de preguntas y respuestas de usuarios</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Tarjeta 7: Lista de Preguntas -->
                    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-semibold mb-4">Lista de preguntas</h3>
                        <p class="text-gray-600 mb-4">Consulta las preguntas incluidas en cada encuesta.</p>
                        <a href="{{ route('encuesta-pregunta.index') }}" class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 transition-all duration-300">Ver lista de preguntas</a>
                    </div>
                    <!-- Tarjeta 10: Respuestas -->
                    <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                        <h3 class="text-xl font-semibold mb-4">Respuestas de usuarios</h3>
                        <p class="text-gray-600 mb-4">Consulta las respuestas de los usuarios a las encuestas.</p>
                        <a href="{{ route('respuestas.index') }}" class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 transition-all duration-300">Ver respuestas</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>