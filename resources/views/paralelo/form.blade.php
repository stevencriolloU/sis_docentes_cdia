<div>
    <label for="nombre_paralelo" class="block text-sm font-medium text-gray-700">Nombre Paralelo</label>
    <input 
        id="nombre_paralelo" 
        name="nombre_paralelo" 
        type="text" 
        value="{{ old('nombre_paralelo', $paralelo?->nombre_paralelo) }}" 
        maxlength="50" 
        autocomplete="nombre_paralelo" 
        placeholder="Nombre Paralelo" 
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
    @error('nombre_paralelo')
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>

<div class="mt-4">
    <button 
        type="submit" 
        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        {{ $paralelo?->exists ? 'Actualizar Paralelo' : 'Crear Paralelo' }}
    </button>
</div>
