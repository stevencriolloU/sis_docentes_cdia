<div class="space-y-6">
    
    <div>
        <x-input-label for="id_curso" :value="__('Id Curso')"/>
        <x-text-input id="id_curso" name="id_curso" type="text" class="mt-1 block w-full" :value="old('id_curso', $cursoparalelo?->id_curso)" autocomplete="id_curso" placeholder="Id Curso"/>
        <x-input-error class="mt-2" :messages="$errors->get('id_curso')"/>
    </div>
    <div>
        <x-input-label for="id_paralelo" :value="__('Id Paralelo')"/>
        <x-text-input id="id_paralelo" name="id_paralelo" type="text" class="mt-1 block w-full" :value="old('id_paralelo', $cursoparalelo?->id_paralelo)" autocomplete="id_paralelo" placeholder="Id Paralelo"/>
        <x-input-error class="mt-2" :messages="$errors->get('id_paralelo')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>