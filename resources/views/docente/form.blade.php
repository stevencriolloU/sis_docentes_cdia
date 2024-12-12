<div class="space-y-6">
    
    <div>
        <x-label for="id_usuario" :value="__('Id Usuario')"/>
        <x-input id="id_usuario" name="id_usuario" type="text" class="mt-1 block w-full" :value="old('id_usuario', $docente?->id_usuario)" autocomplete="id_usuario" placeholder="Id Usuario"/>
        <x-input-error for="contrato"class="mt-2" :messages="$errors->get('id_usuario')"/>
    </div>
    <div>
        <x-label for="contrato" :value="__('Contrato')"/>
        <x-input id="contrato" name="contrato" type="text" class="mt-1 block w-full" :value="old('contrato', $docente?->contrato)" autocomplete="contrato" placeholder="Contrato"/>
        <x-input-error for="contrato" class="mt-2" :messages="$errors->get('contrato')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button>Guardar</x-primary-button>
    </div>
</div>