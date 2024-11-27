<x-app-layout>
    <x-slot name="header">
    <h1 class="text-2xl font-semibold text-gray-800">Bienvenido, ESTUDIANTE</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome/>

            </div>

            <div class="mt-6 lg:p-8 bg-white border-b border-gray-200">
                <!--<x-application-logo class="block h-12 w-auto" />-->

                <h1 class="text-2xl text-center font-semibold text-gray-800">
                    En caso de ser docente, solicite al administrador la asignación de dicho rol.
                </h1>                 
            </div>
        </div>
    </div>
</x-app-layout>




