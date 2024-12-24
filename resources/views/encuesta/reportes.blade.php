<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generar Reporte de Encuestas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Selecciona el rango de fechas para el reporte') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">Indica el período para generar el reporte de las encuestas realizadas.</p>
                        </div>
                    </div>

                    <form action="{{ route('reportes.generar') }}" method="POST" class="mt-6">
                        @csrf
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="sm:col-span-1">
                                <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de inicio</label>
                                <input type="date" id="fecha_inicio" name="fecha_inicio" class="mt-1 block w-full text-sm text-gray-900 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>
                            
                            <div class="sm:col-span-1">
                                <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha de fin</label>
                                <input type="date" id="fecha_fin" name="fecha_fin" class="mt-1 block w-full text-sm text-gray-900 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Generar Reporte
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
