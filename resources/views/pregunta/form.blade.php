<div class="space-y-6">
    <div>
        <label for="id_encuesta" class="block text-sm font-medium text-gray-700">Id Encuesta</label>
        <input id="id_encuesta" name="id_encuesta" type="text" 
            value="{{ old('id_encuesta', $pregunta?->id_encuesta) }}" 
            autocomplete="id_encuesta" placeholder="Id Encuesta" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
        @error('id_encuesta')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="texto_pregunta" class="block text-sm font-medium text-gray-700">Texto Pregunta</label>
        <textarea id="texto_pregunta" name="texto_pregunta" 
            autocomplete="texto_pregunta" placeholder="Texto Pregunta" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('texto_pregunta', $pregunta?->texto_pregunta) }}</textarea>
        @error('texto_pregunta')
            <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
        <select id="type" name="Type" 
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="short_text" {{ old('Type', $pregunta?->Type) == 'short_text' ? 'selected' : '' }}>Texto Corto</option>
            <option value="multiple_choice" {{ old('Type', $pregunta?->Type) == 'multiple_choice' ? 'selected' : '' }}>Opción Múltiple</option>
            <option value="single_choice" {{ old('Type', $pregunta?->Type) == 'single_choice' ? 'selected' : '' }}>Opción Única</option>
        </select>
        @error('Type')
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
