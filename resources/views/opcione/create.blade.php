<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear') }} Opciones
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Crear') }} Opciones</h1>
                            <p class="mt-2 text-sm text-gray-700">Añadir {{ __('Opciones') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('opciones.index') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Regresar</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="max-w-xl py-2 align-middle">
                                <form method="POST" action="{{ route('opciones.store') }}" role="form" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Opción -->
                                    <div class="mb-4">
                                        <label for="opcion" class="block text-sm font-medium text-gray-700">
                                            {{ __('Opción') }}
                                        </label>
                                        <input type="text" id="opcion" name="opcion" value="{{ old('opcion') }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                        @error('opcion')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Valor -->
                                    <div class="mb-4">
                                        <label for="valor" class="block text-sm font-medium text-gray-700">
                                            {{ __('Valor') }}
                                        </label>
                                        <input type="number" id="valor" name="valor" value="{{ old('valor') }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                        @error('valor')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-6 flex justify-end">
                                        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-white font-semibold hover:bg-indigo-500 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600">
                                            {{ __('Crear Opciones') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
