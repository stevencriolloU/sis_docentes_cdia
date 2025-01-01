<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="https://lh6.googleusercontent.com/proxy/rumSgkvAQPNMwibBU3y7ILHbugoo_3S-7KcktyZGwLRhQ4p7F29ivBsK7koVLgMYCv9t1VTaSQI_cyUBhzWpQguVqfJ8AVQq2ySe-FDqug" type="image/png">

        <title>SISTEMA DE SEGUIMIENTO DOCENTE</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                @import url('https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css');
            </style>
        @endif
    </head>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-center text-xl text-white leading-tight">
                Gestion de roles de usuario
            </h2>
        </x-slot>    


        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center">
                            <div class="flex items-center justify-between sm:flex-auto">
                                <h1 class="mt-2 text-center font-semibold text-white">Lista de Usuarios y roles</h1>
                                <img src="{{ asset('images/Gestionar.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 ml-4">
                            </div>                        
                        </div>

                        <div class="flow-root">
                            <div class="mt-8 overflow-x-auto">
                                <div class="inline-block min-w-full rounded-lg py-2 text-white align-middle bg-gray-500">
                                    <table class="w-full divide-y divide-gray-300">
                                        <thead>
                                            <tr>
                                            <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-white">ID</th>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-white">Nombre</th>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-white">Email</th>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-white">Rol</th>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-center text-xs font-semibold uppercase tracking-wide text-white">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @foreach($users as $user)
                                                <tr class="even:bg-gray-50">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-l font-semibold text-gray-900">{{ $user->id }}</td>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-l text-gray-900">{{ $user->name }}</td>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-l text-gray-900">{{ $user->email }}</td>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-l text-gray-900">{{ $user->getRoleNames()->implode(', ') }}</td>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-l text-gray-900">
                                                        <!-- Formulario para cambiar el rol -->
                                                        <form action="{{ route('admin.users.update-role', $user) }}" method="POST" class="flex flex-row items-center justify-center">
                                                            @csrf
                                                            <select name="role" class="form-control">
                                                                <option value="estudiante" {{ $user->hasRole('estudiante') ? 'selected' : '' }}>Estudiante</option>
                                                                <option value="docente" {{ $user->hasRole('docente') ? 'selected' : '' }}>Docente</option>
                                                                <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                                                            </select>
                                                            <button type="submit" 
                                                                class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                                                <img src="{{ asset('images/cambiar.svg') }}" alt="Icono de inicio de sesión" class="h-6 w-6 mr-2">
                                                                Cambiar Rol
                                                            </button>
                                                        </form>                            
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</html>