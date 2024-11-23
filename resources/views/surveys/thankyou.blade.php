<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">¡Gracias por Responder!</h2>
    </x-slot>
    <p class="text-center mt-5">Tus respuestas han sido enviadas correctamente.</p>

    <a
        href="{{ route(Auth::user()->hasRole('admin') ? 'admin.dashboard' : (Auth::user()->hasRole('docente') ? 'docente.dashboard' : 'estudiante.dashboard')) }}"

        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
    >
        Dashboard
    </a>
    
</x-app-layout>
