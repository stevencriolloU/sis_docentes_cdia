<div class="space-y-6">
    
    <div>
        <x-input-label for="pregunta_id" :value="__('Pregunta Id')"/>
        <x-text-input id="pregunta_id" name="pregunta_id" type="text" class="mt-1 block w-full" :value="old('pregunta_id', $preguntaOpcion?->pregunta_id)" autocomplete="pregunta_id" placeholder="Pregunta Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('pregunta_id')"/>
    </div>
    <div>
        <x-input-label for="opcion_id" :value="__('Opcion Id')"/>
        <x-text-input id="opcion_id" name="opcion_id" type="text" class="mt-1 block w-full" :value="old('opcion_id', $preguntaOpcion?->opcion_id)" autocomplete="opcion_id" placeholder="Opcion Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('opcion_id')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>