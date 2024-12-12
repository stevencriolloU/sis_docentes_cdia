<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update') }} Pregunta Opcion
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Update') }} Pregunta Opcion</h1>
                            <p class="mt-2 text-sm text-gray-700">Update existing {{ __('Pregunta Opcion') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('pregunta-opcions.index') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="max-w-xl py-2 align-middle">
                                <form method="POST" action="{{ route('pregunta-opcions.update', $preguntaOpcion->id) }}" role="form" enctype="multipart/form-data">
                                    {{ method_field('PATCH') }}
                                    @csrf

                                    <!-- Pregunta -->
                                    <div class="mb-4">
                                        <label for="pregunta_id" class="block text-sm font-medium text-gray-700">
                                            {{ __('Pregunta') }}
                                        </label>
                                        <select id="pregunta_id" name="pregunta_id" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                            @foreach ($preguntas as $pregunta)
                                                <option value="{{ $pregunta->id }}" {{ old('pregunta_id', $preguntaOpcion->pregunta_id) == $pregunta->id ? 'selected' : '' }}>
                                                    {{ $pregunta->pregunta }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pregunta_id')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Opción -->
                                    <div class="mb-4">
                                        <label for="opcion_id" class="block text-sm font-medium text-gray-700">
                                            {{ __('Opción') }}
                                        </label>
                                        <select id="opcion_id" name="opcion_id" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                            @foreach ($opciones as $opcion)
                                                <option value="{{ $opcion->id }}" {{ old('opcion_id', $preguntaOpcion->opcion_id) == $opcion->id ? 'selected' : '' }}>
                                                    {{ $opcion->opcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('opcion_id')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-6 flex justify-end">
                                        <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-white font-semibold hover:bg-indigo-500 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600">
                                            {{ __('Update Pregunta Opcion') }}
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
