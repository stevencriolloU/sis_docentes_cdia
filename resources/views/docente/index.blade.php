<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Docentes') }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    

    

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Docentes') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">Lista de {{ __('Docentes') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('docentes.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Añadir</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class=" min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">N°</th>
<!--                                        
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Id Curso Paralelo</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Id Periodo</th>
-->
									<th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Id Usuario</th>
                                    <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Nombre</th>

                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($docentes as $docente)
                                        <tr class="even:bg-gray-50">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ ++$i }}</td>
                                        <!--    
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $docente->id_curso_paralelo }}</td>
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $docente->id_periodo }}</td>
-->
										<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $docente->id_usuario }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $docente->user->name }}</td>

                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                <form action="{{ route('docentes.destroy', $docente->id) }}" method="POST">
                                                    <a href="{{ route('docentes.show', $docente->id) }}" class=" rounded-md bg-cyan-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">{{ __('Mostrar') }}</a>
                                                    <a href="{{ route('docentes.edit', $docente->id) }}" class=" rounded-md bg-orange-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">{{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('docentes.destroy', $docente->id) }}" class=" rounded-md bg-red-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Eliminar') }}</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 px-4">
                                    {!! $docentes->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>