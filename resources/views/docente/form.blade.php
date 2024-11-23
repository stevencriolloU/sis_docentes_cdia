<div class="space-y-6">
    <div>
        <label for="id_curso_paralelo" class="block text-sm font-medium text-gray-700">Id Curso Paralelo</label>
        <input id="id_curso_paralelo" name="id_curso_paralelo" type="text" value="{{ old('id_curso_paralelo', $docente?->id_curso_paralelo) }}" autocomplete="id_curso_paralelo" placeholder="Id Curso Paralelo" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
        @error('id_curso_paralelo')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="id_periodo" class="block text-sm font-medium text-gray-700">Id Periodo</label>
        <input id="id_periodo" name="id_periodo" type="text" value="{{ old('id_periodo', $docente?->id_periodo) }}" autocomplete="id_periodo" placeholder="Id Periodo" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
        @error('id_periodo')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="id_usuario" class="block text-sm font-medium text-gray-700">Id Usuario</label>
        <input id="id_usuario" name="id_usuario" type="text" value="{{ old('id_usuario', $docente?->id_usuario) }}" autocomplete="id_usuario" placeholder="Id Usuario" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
        @error('id_usuario')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Submit
        </button>
    </div>
</div>
