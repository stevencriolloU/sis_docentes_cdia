<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome/>

                <!-- Botón para redirigir a la página de gestión de usuarios -->
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary mt-3">
                    Gestionar Usuarios
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
