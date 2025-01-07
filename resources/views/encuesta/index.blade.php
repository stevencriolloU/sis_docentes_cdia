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

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const errorMessage = "{{ session('error') }}";
                if (errorMessage) {
                    alert(errorMessage);
                }
            });
        </script>
    </head>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-center text-white leading-tight">
                {{ __('Encuestas') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="bg-gray-500 rounded-lg p-6 shadow flex flex-col justify-center items-center">
                            <div class="flex items-center justify-between sm:flex-auto">
                                <h1 class="mt-2 font-semibold text-white">Lista de {{ __('Encuestas') }}</h1>
                                <img src="{{ asset('images/encuestas.svg') }}" alt="Icono de inicio de sesión" class="h-8 w-8 ml-4">
                            </div>
                        </div>

                        <div class="flow-root">
                            <div class="mt-8 overflow-x-auto text-center">
                                <div class="inline-block min-w-full py-2 text-center rounded-lg align-middle bg-gray-500">
                                    <table class="w-full divide-y divide-gray-300 text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">No</th>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">Nombre de la Asignatura</th>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">Nombre Encuesta</th>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">Fecha Creacion</th>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">Creado Por</th>
                                                <th scope="col" class="py-3 pl-4 pr-3 text-l font-semibold uppercase tracking-wide text-white">Enlace Encuesta</th>
                                                <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @foreach ($encuestas as $encuesta)
                                                <tr class="even:bg-gray-50">
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $encuesta->asignatura->nombre_asignatura ?? 'N/A' }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $encuesta->nombre_encuesta }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($encuesta->created_at)->format('d/m/Y') }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $encuesta->docente->user->name ?? 'N/A' }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $encuesta->enlace_encuesta }}</td>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                        <form action="{{ route('encuestas.destroy', $encuesta->id) }}" method="POST" class="flex justify-center">
                                                            <a href="{{ route('encuestas.show', $encuesta->id) }}" 
                                                               class="flex items-center bg-gray-800 hover:bg-gray-700 text-white font-bold rounded-md transition-all duration-300 ml-2 px-3 py-2">
                                                                <img src="{{ asset('images/mostrar.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
                                                                {{ __('Mostrar') }}
                                                            </a>

                                                            @if (!auth()->user()->hasRole('admin')) <!-- Verifica el rol ya que solo el docente que la creó la puede editar -->
                                                                <a href="{{ route('encuestas.edit', $encuesta->id) }}" 
                                                                   class="text-indigo-600 font-bold hover:text-indigo-900 mr-2">{{ __('Editar') }}</a>
                                                            @endif

                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('encuestas.destroy', $encuesta->id) }}" class="text-red-600 font-bold hover:text-red-900" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Eliminar') }}</a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="mt-4 px-4">
                                        {!! $encuestas->withQueryString()->links() !!}
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
