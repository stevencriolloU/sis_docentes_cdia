<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Encuestas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Encuestas') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">Lista de {{ __('Encuestas') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        @if (!auth()->user()->hasRole('admin')) <!-- Si NO es admin -->
                            <a type="button" 
                            href="{{ route('encuestas.create') }}" 
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Añadir Nueva
                            </a>
                        @else <!-- Si es admin -->
                            <a type="button" 
                            href="javascript:void(0);" 
                            class="block rounded-md bg-gray-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm cursor-not-allowed opacity-70">
                                Añadir nueva (solo docentes)
                            </a>
                        @endif
                    </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">No</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Nombre de la Asignatura</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Nombre Encuesta</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Fecha Creacion</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Creado Por</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Enlace Encuesta</th>

                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($encuestas as $encuesta)
                                        <tr class="even:bg-gray-50">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                            
                                            <!-- Mostrar nombre de la asignatura -->
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $encuesta->asignatura->nombre_asignatura ?? 'N/A' }}</td>
                                            
                                            <!-- Mostrar nombre de la encuesta -->
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $encuesta->nombre_encuesta }}</td>
                                            
                                            <!-- Mostrar fecha de creación -->
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($encuesta->created_at)->format('d/m/Y') }}</td>
                                            
                                            <!-- Mostrar nombre del creador -->
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $encuesta->docente->user->name ?? 'N/A' }}</td>
                                            
                                            <!-- Mostrar enlace de la encuesta -->
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $encuesta->enlace_encuesta }}</td>

                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                <form action="{{ route('encuestas.destroy', $encuesta->id) }}" method="POST">
                                                    <a href="{{ route('encuestas.show', $encuesta->id) }}" class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Mostrar') }}</a>
                                                    
                                                    @if (!auth()->user()->hasRole('admin')) <!-- Verifica el rol ya que solo el docente que la creó la puede editar -->
                                                        <a href="{{ route('encuestas.edit', $encuesta->id) }}" class="text-indigo-600 font-bold hover:text-indigo-900 mr-2">{{ __('Editar') }}</a>
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
