<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenido, Admin
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('admin.users.index') }}" 
                    class="inline-flex items-center px-6 py-2 mt-3 bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Gestionar Usuarios
                </a>

                <a href="{{ route('cursos.index') }}" 
                    class="inline-flex items-center px-6 py-2 mt-3 bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Cursos
                </a>
                <a href="{{ route('paralelos.index') }}" 
                    class="inline-flex items-center px-6 py-2 mt-3 bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Paralelos
                </a>
                <a href="{{ route('cursoparalelos.index') }}" 
                    class="inline-flex items-center px-6 py-2 mt-3 bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Cursos-Paralelos
                </a>
                <a href="{{ route('periodos.index') }}" 
                    class="inline-flex items-center px-6 py-2 mt-3 bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Periodos
                </a>

                <a href="{{ route('docentes.index') }}" 
                    class="inline-flex items-center px-6 py-2 mt-3 bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Docentes
                </a>

                <a href="{{ route('clases.index') }}" 
                    class="inline-flex items-center px-6 py-2 mt-3 bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Clases
                </a>

                <a href="{{ route('encuestas.index') }}" 
                    class="inline-flex items-center px-6 py-2 mt-3 bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Encuestas
                </a>

                <a href="{{ route('preguntas.index') }}" 
                    class="inline-flex items-center px-6 py-2 mt-3 bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 ease-in-out">
                    Preguntas
                </a>
            </div>
        </div>
    </div>

</x-app-layout>
