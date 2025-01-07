<div class="space-y-6">
    <!-- Campo Id Docente -->
    <div>
        <x-label for="id_docente" :value="__('Docente')" />
        <select id="id_docente" name="id_docente" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @foreach($docentes as $docente)
                <option value="{{ $docente->id }}" {{ old('id_docente', $asignatura?->id_docente) == $docente->id ? 'selected' : '' }}>
                    {{ $docente->user->name }}
                </option>
            @endforeach
        </select>
        <x-input-error for="id_docente" class="mt-2" :messages="$errors->get('id_docente')" />
    </div>

    <!-- Campo Id Curso -->
    <div>
        <x-label for="id_curso" :value="__('Curso')" />
        <select id="id_curso" name="id_curso" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}" {{ old('id_curso', $asignatura?->id_curso) == $curso->id ? 'selected' : '' }}>
                    {{ $curso->semestre }} {{ $curso->paralelo }}
                </option>
            @endforeach
        </select>
        <x-input-error for="id_curso" class="mt-2" :messages="$errors->get('id_curso')" />
    </div>

    <!-- Campo Nombre Asignatura -->
    <div>
        <x-label for="nombre_asignatura" :value="__('Nombre Asignatura')" />
        <x-input id="nombre_asignatura" name="nombre_asignatura" type="text" class="mt-1 block w-full" :value="old('nombre_asignatura', $asignatura?->nombre_asignatura)" autocomplete="nombre_asignatura" placeholder="Nombre Asignatura" />
        <x-input-error for="nombre_asignatura" class="mt-2" :messages="$errors->get('nombre_asignatura')" />
    </div>

    <!-- Campo Periodo -->
    <div>
        <x-label for="periodo" :value="__('Periodo')" />
        <select id="periodo" name="periodo" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="2024-2s" {{ old('periodo', $asignatura?->periodo) == '2024-2s' ? 'selected' : '' }}>2024-2s</option>
            <option value="2025-1s" {{ old('periodo', $asignatura?->periodo) == '2025-1s' ? 'selected' : '' }}>2025-1s</option>
            <option value="2025-2s" {{ old('periodo', $asignatura?->periodo) == '2025-2s' ? 'selected' : '' }}>2025-2s</option>
        </select>
        <x-input-error for="periodo" class="mt-2" :messages="$errors->get('periodo')" />
    </div>

    <!-- Botón de Envío -->
    <div class="flex items-center gap-4 justify-center">
        <x-button>
            <img src="{{ asset('images/guardar.svg') }}" alt="Icono de inicio de sesión" class="h-5 w-5 mr-2">
            Guardar
        </x-button>
    </div>
</div>
