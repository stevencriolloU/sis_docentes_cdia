<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualizar') }} Pregunta
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Actualizar') }} Pregunta</h1>
                            <p class="mt-2 text-sm text-gray-700">Actualizar {{ __('Pregunta') }} Existente.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('preguntas.index') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Regresar
                            </a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="max-w-xl py-2 align-middle">
                                <form method="POST" action="{{ route('preguntas.update', $pregunta->id) }}" role="form" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf

                                    <!-- Enunciado -->
                                    <div class="mb-4">
                                        <label for="enunciado" class="block text-sm font-medium text-gray-700">
                                            {{ __('Enunciado') }}
                                        </label>
                                        <input type="text" id="enunciado" name="enunciado" value="{{ old('enunciado', $pregunta->enunciado) }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                        @error('enunciado')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Tipo de pregunta -->
                                    <div class="mb-4">
                                        <label for="tipo_pregunta" class="block text-sm font-medium text-gray-700">
                                            {{ __('Tipo de Pregunta') }}
                                        </label>
                                        <select id="tipo_pregunta" name="tipo_pregunta" class="form-select rounded-md shadow-sm mt-1 block w-full">
                                            <option value="texto_libre" {{ $pregunta->tipo_pregunta == 'texto_libre' ? 'selected' : '' }}>Texto Libre</option>
                                            <option value="seleccion_simple" {{ $pregunta->tipo_pregunta == 'seleccion_simple' ? 'selected' : '' }}>Selección Simple</option>
                                            <option value="seleccion_multiple" {{ $pregunta->tipo_pregunta == 'seleccion_multiple' ? 'selected' : '' }}>Selección Múltiple</option>
                                        </select>
                                        @error('tipo_pregunta')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Escala -->
                                    <div class="mb-4">
                                        <label for="escala" class="block text-sm font-medium text-gray-700">
                                            {{ __('Escala') }}
                                        </label>
                                        <select id="escala" name="escala" class="form-select rounded-md shadow-sm mt-1 block w-full">
                                            <option value="">-- {{ __('Seleccione') }} --</option>
                                            <option value="rango" {{ $pregunta->escala == 'rango' ? 'selected' : '' }}>Rango</option>
                                            <option value="likert" {{ $pregunta->escala == 'likert' ? 'selected' : '' }}>Likert</option>
                                            <option value="si_no" {{ $pregunta->escala == 'si_no' ? 'selected' : '' }}>Sí / No</option>
                                        </select>
                                        @error('escala')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Botón de actualizar -->
                                    <div class="mt-6 flex justify-end">
                                        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-white font-semibold hover:bg-indigo-500 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600">
                                            {{ __('Actualizar Pregunta') }}
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
