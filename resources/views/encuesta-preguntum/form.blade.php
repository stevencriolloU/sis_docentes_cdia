<div class="space-y-6">
    <div>
        <x-label for="id_encuesta" :value="__('Encuesta')"/>
        <select id="id_encuesta" name="id_encuesta" class="mt-1 block w-full">
            <option value="">Seleccione una encuesta</option>
            @foreach($encuestas as $encuesta)
                <option value="{{ $encuesta->id }}" {{ old('id_encuesta') == $encuesta->id ? 'selected' : '' }}>                
                    {{ $encuesta->id }} - {{ $encuesta->nombre_encuesta ?? 'Sin nombre' }}
                </option>
            @endforeach
        </select>
        <x-input-error for="id_encuesta" class="mt-2" :messages="$errors->get('id_encuesta')"/>
    </div>

    <div>
        <x-label for="id_pregunta" :value="__('Pregunta')"/>
        <select id="id_pregunta" name="id_pregunta" class="mt-1 block w-full">
            <option value="">Seleccione una pregunta</option>
            @foreach($preguntas as $pregunta)
                <option value="{{ $pregunta->id }}" {{ old('id_pregunta') == $pregunta->id ? 'selected' : '' }}>                    
                    {{ $pregunta->id }} - {{ $pregunta->enunciado ?? 'Sin enunciado' }}
                </option>
            @endforeach
        </select>
        <x-input-error for="id_pregunta" class="mt-2" :messages="$errors->get('id_pregunta')"/>
    </div>

    <!-- Botón de envío -->
    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
