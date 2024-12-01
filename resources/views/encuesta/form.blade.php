<div class="space-y-6">
    <!-- Campo para seleccionar la asignatura -->
    <div>
        <x-label for="id_asignatura" :value="__('Asignatura')" />
        <select id="id_asignatura" name="id_asignatura" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option value="">Selecciona una asignatura</option>
            @foreach ($asignaturas as $asignatura)
                <option value="{{ $asignatura->id }}"
                        {{ old('id_asignatura', $encuesta?->id_asignatura) == $asignatura->id ? 'selected' : '' }}>
                    {{ $asignatura->nombre_asignatura }}
                </option>
            @endforeach
        </select>
        <x-input-error for="id_asignatura" class="mt-2" :messages="$errors->get('id_asignatura')" />
    </div>

    <!-- Campo para el nombre de la encuesta -->
    <div>
        <x-label for="nombre_encuesta" :value="__('Nombre de la Encuesta')" />
        <x-input id="nombre_encuesta" name="nombre_encuesta" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                 :value="old('nombre_encuesta', $encuesta?->nombre_encuesta)" autocomplete="nombre_encuesta"
                 placeholder="Escribe el nombre de la encuesta" />
        <x-input-error for="nombre_encuesta" class="mt-2" :messages="$errors->get('nombre_encuesta')" />
    </div>

    <!-- Campo oculto para el docente que crea la encuesta -->
    <input type="hidden" name="creado_por" value="{{ Auth()->user()->docente->id }}">

    <!-- Lista de preguntas disponibles -->
    <div>
        <x-label :value="__('Preguntas disponibles')" />
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($preguntas as $pregunta)
                <label for="pregunta_{{ $pregunta->id }}" 
                       class="block border rounded-lg p-4 shadow-sm bg-white cursor-pointer hover:ring-2 hover:ring-indigo-500 hover:shadow-lg transition 
                              group focus-within:ring-2 focus-within:ring-indigo-500"
                       x-data="{ selected: false }"
                       :class="{ 'border-indigo-500 hover:border-indigo-500 ring-2 ring-cyan-500': selected }">
                    <input type="checkbox" id="pregunta_{{ $pregunta->id }}" name="preguntas[]" value="{{ $pregunta->id }}" 
                           class="hidden"
                           x-model="selected"
                           {{ in_array($pregunta->id, old('preguntas', [])) ? 'checked' : '' }}>
                    <h5 class="font-semibold text-lg text-gray-700">{{ $pregunta->enunciado }}</h5>
                    @if ($pregunta->opciones->isNotEmpty())
                        <ul class="mt-2 space-y-1 text-sm text-gray-600 list-disc list-inside ">
                            @foreach ($pregunta->opciones as $opcion)
                                <li>{{ $opcion->opcion }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-gray-500 italic">No hay opciones disponibles para esta pregunta.</p>
                    @endif
                </label>
            @endforeach
        </div>
        <x-input-error for="preguntas" class="mt-2" :messages="$errors->get('preguntas')" />
    </div>

    <!-- Botón para enviar el formulario -->
    <div class="flex items-center gap-4">
        <x-button>Crear Encuesta</x-button>
    </div>
</div>
