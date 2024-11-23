<div>
    <label for="nombre_curso" class="block text-sm font-medium text-gray-700">Nombre Curso</label>
    <input id="nombre_curso" name="nombre_curso" type="text" value="{{ old('nombre_curso', $curso?->nombre_curso) }}" autocomplete="nombre_curso" placeholder="Nombre Curso" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
    @error('nombre_curso')
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>
<div>
    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
    <input id="descripcion" name="descripcion" type="text" value="{{ old('descripcion', $curso?->descripcion) }}" autocomplete="descripcion" placeholder="Descripcion" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
    @error('descripcion')
        <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</div>

<div class="mt-4">
    <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
</div>
