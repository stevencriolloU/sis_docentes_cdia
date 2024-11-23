<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }} Cursoparalelo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Create') }} Cursoparalelo</h1>
                            <p class="mt-2 text-sm text-gray-700">Add a new {{ __('Cursoparalelo') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('cursoparalelos.index') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="max-w-xl py-2 align-middle">
                                <!-- Formulario de creación de Cursoparalelo -->
                                <form method="POST" action="{{ route('cursoparalelos.store') }}" role="form" enctype="multipart/form-data">
                                    @csrf

                                    <div class="space-y-6">
                                        <!-- Campo de ID Curso -->
                                        <div>
                                            <x-input-label for="id_curso" :value="__('Id Curso')" />
                                            <x-text-input id="id_curso" name="id_curso" type="text" class="mt-1 block w-full" :value="old('id_curso')" autocomplete="id_curso" placeholder="Id Curso" />
                                            <x-input-error class="mt-2" :messages="$errors->get('id_curso')" />
                                        </div>

                                        <!-- Campo de ID Paralelo -->
                                        <div>
                                            <x-input-label for="id_paralelo" :value="__('Id Paralelo')" />
                                            <x-text-input id="id_paralelo" name="id_paralelo" type="text" class="mt-1 block w-full" :value="old('id_paralelo')" autocomplete="id_paralelo" placeholder="Id Paralelo" />
                                            <x-input-error class="mt-2" :messages="$errors->get('id_paralelo')" />
                                        </div>

                                        <!-- Botón de Enviar -->
                                        <div class="flex items-center gap-4">
                                            <x-primary-button>{{ __('Submit') }}</x-primary-button>
                                        </div>
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
