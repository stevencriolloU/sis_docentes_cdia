<div class="space-y-6">
    <div>
        <label for="id_registro_clase" class="block text-sm font-medium text-gray-700">Id Registro Clase</label>
        <input id="id_registro_clase" name="id_registro_clase" type="text" 
            value="{{ old('id_registro_clase', $encuesta?->id_registro_clase) }}" 
            autocomplete="id_registro_clase" placeholder="Id Registro Clase" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
        @error('id_registro_clase')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="fecha_creacion" class="block text-sm font-medium text-gray-700">Fecha Creación</label>
        <input id="fecha_creacion" name="fecha_creacion" type="date" 
            value="{{ old('fecha_creacion', $encuesta?->fecha_creacion) }}" 
            autocomplete="fecha_creacion" placeholder="Fecha Creación" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
        @error('fecha_creacion')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
        <select id="estado" name="estado" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="Pendiente" {{ old('estado', $encuesta?->estado) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="Finalizar" {{ old('estado', $encuesta?->estado) == 'Finalizar' ? 'selected' : '' }}>Finalizar</option>
        </select>
        @error('estado')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="enlace_encuesta" class="block text-sm font-medium text-gray-700">Enlace Encuesta</label>
        <input id="enlace_encuesta" name="enlace_encuesta" type="url" 
            value="{{ old('enlace_encuesta', $encuesta?->enlace_encuesta) }}" 
            autocomplete="enlace_encuesta" placeholder="Enlace Encuesta" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
        @error('enlace_encuesta')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <button type="submit" 
            class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Submit
        </button>
    </div>
</div>
