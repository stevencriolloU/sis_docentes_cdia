<div class="space-y-6">
    <div>
        <label for="id_docente" class="block text-sm font-medium text-gray-700">Id Docente</label>
        <input id="id_docente" name="id_docente" type="text" value="{{ old('id_docente', $clase?->id_docente) }}" autocomplete="id_docente" placeholder="Id Docente" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
        @error('id_docente')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="hora_inicio" class="block text-sm font-medium text-gray-700">Hora Inicio</label>
        <input id="hora_inicio" name="hora_inicio" type="text" value="{{ old('hora_inicio', $clase?->hora_inicio) }}" autocomplete="hora_inicio" placeholder="Hora Inicio" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
        @error('hora_inicio')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="hora_fin" class="block text-sm font-medium text-gray-700">Hora Fin</label>
        <input id="hora_fin" name="hora_fin" type="text" value="{{ old('hora_fin', $clase?->hora_fin) }}" autocomplete="hora_fin" placeholder="Hora Fin" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
        @error('hora_fin')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Submit
        </button>
    </div>
</div>
