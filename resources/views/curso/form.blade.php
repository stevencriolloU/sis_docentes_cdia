<div class="space-y-6">
    <!-- Campo Semestre -->
    <div>
        <x-label for="semestre" :value="__('Semestre')" />
        <select id="semestre" name="semestre" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @foreach(['1ero', '2do', '3ro', '4to', '5to', '6to', '7mo', '8vo'] as $semestre)
                <option value="{{ $semestre }}" {{ old('semestre', $curso?->semestre) === $semestre ? 'selected' : '' }}>
                    {{ $semestre }}
                </option>
            @endforeach
        </select>
        <x-input-error for="semestre" class="mt-2" :messages="$errors->get('semestre')" />
    </div>

    <!-- Campo Paralelo -->
    <div>
        <x-label for="paralelo" :value="__('Paralelo')" />
        <select id="paralelo" name="paralelo" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @foreach(['A', 'B'] as $paralelo)
                <option value="{{ $paralelo }}" {{ old('paralelo', $curso?->paralelo) === $paralelo ? 'selected' : '' }}>
                    {{ $paralelo }}
                </option>
            @endforeach
        </select>
        <x-input-error for="paralelo" class="mt-2" :messages="$errors->get('paralelo')" />
    </div>

    <!-- Botón de Envío -->
    <div class="flex items-center gap-4">
        <x-button>Guardar</x-button>
    </div>
</div>
