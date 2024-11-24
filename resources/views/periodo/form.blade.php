<div>
    <label for="periodo_inicio" class="block text-sm font-medium text-gray-700">Periodo Inicio</label>
    <input id="periodo_inicio" name="periodo_inicio" type="text" value="{{ old('periodo_inicio', $periodo?->periodo_inicio) }}" autocomplete="periodo_inicio" placeholder="Periodo Inicio" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
    @error('periodo_inicio')
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>

<div>
    <label for="periodo_fin" class="block text-sm font-medium text-gray-700">Periodo Fin</label>
    <input id="periodo_fin" name="periodo_fin" type="text" value="{{ old('periodo_fin', $periodo?->periodo_fin) }}" autocomplete="periodo_fin" placeholder="Periodo Fin" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
    @error('periodo_fin')
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>

<div class="mt-4">
    <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Guardar</button>
</div>
