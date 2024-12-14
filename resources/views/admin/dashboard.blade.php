<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenido, Admin
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Tarjeta 1 -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold mb-4">Gestionar Roles</h3>
                <p class="text-gray-600 mb-4">Administra roles de todos los usuarios del sistema.</p>
                <a href="{{ route('admin.users.index') }}" 
                    class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Gestionar Roles
                </a>
            </div>
            
            <!-- Tarjeta 2 -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold mb-4">Cursos</h3>
                <p class="text-gray-600 mb-4">Accede a la lista completa de cursos disponibles.</p>
                <a href="{{ route('cursos.index') }}" 
                    class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Cursos
                </a>
            </div>            

            <!-- Tarjeta 3 -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold mb-4">Docentes</h3>
                <p class="text-gray-600 mb-4">Gestiona la información de los docentes en el sistema.</p>
                <a href="{{ route('docentes.index') }}" 
                    class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Docentes
                </a>
            </div>

            <!-- Tarjeta 4 -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold mb-4">Asignaturas</h3>
                <p class="text-gray-600 mb-4">Consulta y administra todas las clases asignaturas de un docente.</p>
                <a href="{{ route('asignaturas.index') }}" 
                    class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Asignaturas
                </a>
            </div>

            <!-- Tarjeta 5 -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold mb-4">Encuestas</h3>
                <p class="text-gray-600 mb-4">Consulta y administra todas las clases asignaturas de un docente.</p>
                <a href="{{ route('encuestas.index') }}" 
                    class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Encuestas
                </a>
            </div>            

            <!-- Tarjeta 6 -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold mb-4">Preguntas</h3>
                <p class="text-gray-600 mb-4">Consulta y administra todas las clases asignaturas de un docente.</p>
                <a href="{{ route('preguntas.index') }}" 
                    class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Preguntas
                </a>
            </div>

            <!-- Tarjeta 7 -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold mb-4">Encuesta Pregunta</h3>
                <p class="text-gray-600 mb-4">Consulta y administra todas las clases asignaturas de un docente.</p>
                <a href="{{ route('encuesta-pregunta.index') }}" 
                    class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Encuesta Pregunta
                </a>
            </div>

            <!-- Tarjeta 8 -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold mb-4">Opciones</h3>
                <p class="text-gray-600 mb-4">Consulta y administra todas las clases asignaturas de un docente.</p>
                <a href="{{ route('opciones.index') }}" 
                    class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Opciones
                </a>
            </div>

             <!-- Tarjeta 9 -->
             <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold mb-4">Pregunta Opcion</h3>
                <p class="text-gray-600 mb-4">Consulta y administra todas las clases asignaturas de un docente.</p>
                <a href="{{ route('pregunta-opcions.index') }}" 
                    class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Pregunta Opcion
                </a>
            </div>
            
            <!-- Tarjeta 10 -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold mb-4">Respuestas</h3>
                <p class="text-gray-600 mb-4">Consulta y administra todas las clases asignaturas de un docente.</p>
                <a href="{{ route('respuestas.index') }}" 
                    class="inline-flex items-center px-6 py-2 bg-blue-500 text-white border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Respuestas
                </a>
            </div>

            <!-- Reportes del Admin -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-6">
                    <h3 class="text-xl font-semibold mb-4">Reportes</h3>
                    <p class="text-gray-600 mb-4">Accede a los reportes de actividades de docentes y estudiantes.</p>

                    <!-- Reportes -->
                    <div class="space-y-4">
                        <a href="{{ route('reporte.index') }}" 
                            class="inline-flex items-center px-6 py-2 bg-green-500 text-white border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 ease-in-out">
                            Reporte Conexiones Docente
                        </a>

                        <a href="{{ route('reporte.docente.novedades') }}" 
                            class="inline-flex items-center px-6 py-2 bg-green-500 text-white border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 ease-in-out">
                            Reporte Novedades Docente
                        </a>

                        <a href="{{ route('reporte.estudiantes.conexiones') }}" 
                            class="inline-flex items-center px-6 py-2 bg-green-500 text-white border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 ease-in-out">
                            Reporte Estudiantes
                        </a>
                    </div>


        </div>
    </div>
</div>


</x-app-layout>
