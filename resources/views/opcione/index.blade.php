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
            <h2 class="font-semibold text-xl text-center text-white leading-tight">
                {{ __('Opciones') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center">
                            <div class="flex items-center justify-between sm:flex-auto">
                                <h1 class="mt-2 font-semibold text-white">Lista de {{ __('Opciones') }}</h1>
                                <img src="{{ asset('images/opciones.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 ml-4">
                            </div>
                        </div>

                        <div class="flow-root">
                            <div class="mt-8 overflow-x-auto text-center">
                                <div class="inline-block min-w-full py-2 text-center rounded-lg align-middle bg-gray-500">
                                    <table class="w-full divide-y divide-gray-300 text-center">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">No</th>
                                            <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">Opcion</th>
                                            <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">Valor</th>
                                            <th scope="col" class="px-3 py-3 text-l font-semibold uppercase tracking-wide text-white">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($opciones as $opcione)
                                            <tr class="even:bg-gray-50">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $opcione->opcion }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $opcione->valor }}</td>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                    <form action="{{ route('opciones.destroy', $opcione->id) }}" method="POST" class="flex justify-center">
                                                        <a href="{{ route('opciones.show', $opcione->id) }}" 
                                                            class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                                            <img src="{{ asset('images/mostrar.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                                            {{ __('Mostrar') }}
                                                        </a>
                                                        <a href="{{ route('opciones.edit', $opcione->id) }}" 
                                                            class="flex items-center bg-gray-800 hover:bg-indigo-600 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                                            <img src="{{ asset('images/editar.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                                            {{ __('Editar') }}
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('opciones.destroy', $opcione->id) }}" 
                                                            class="flex items-center bg-gray-800 hover:bg-red-600 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2" onclick="event.preventDefault(); confirm('¿Esta seguro que desea eliminarlo?') ? this.closest('form').submit() : false;">
                                                            <img src="{{ asset('images/eliminar.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                                            {{ __('Eliminar') }}
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    <div class="mt-4 px-4">
                                        {!! $opciones->withQueryString()->links() !!}
                                    </div>

                                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                        <a type="button" href="{{ route('opciones.create') }}" 
                                            class="inline-flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                            <img src="{{ asset('images/añadir.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                            Añadir una nueva opción
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</html>