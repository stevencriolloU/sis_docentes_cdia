<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-indigo-800 leading-tight text-center">
            ¡Gracias por Responder!
        </h2>
    </x-slot>

    <div class="flex justify-center items-center flex-col mt-8 space-y-6 bg-gray-50 p-8 rounded-lg shadow-lg">
        <p class="text-lg text-gray-700 text-center">
            Tus respuestas han sido enviadas correctamente. ¡Te agradecemos tu participación!
        </p>

        <!-- Botón redirigir al Dashboard -->
        <a href="{{ route(Auth::user()->hasRole('admin') ? 'admin.dashboard' : (Auth::user()->hasRole('docente') ? 'docente.dashboard' : 'estudiante.dashboard')) }}" 
            class="rounded-full bg-indigo-600 text-white px-6 py-3 text-lg font-semibold shadow-md hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Ir al Dashboard
        </a>
    </div>
</x-app-layout>
