<div class="space-y-6">
    
    <div>
        <x-label for="id_asignatura" :value="__('Id Asignatura')"/>
        <x-input id="id_asignatura" name="id_asignatura" type="text" class="mt-1 block w-full" :value="old('id_asignatura', $encuesta?->id_asignatura)" autocomplete="id_asignatura" placeholder="Id Asignatura"/>
        <x-input-error for="id_asignatura" class="mt-2" :messages="$errors->get('id_asignatura')"/>
    </div>
    <div>
        <x-label for="nombre_encuesta" :value="__('Nombre Encuesta')"/>
        <x-input id="nombre_encuesta" name="nombre_encuesta" type="text" class="mt-1 block w-full" :value="old('nombre_encuesta', $encuesta?->nombre_encuesta)" autocomplete="nombre_encuesta" placeholder="Nombre Encuesta"/>
        <x-input-error for="nombre_encuesta" class="mt-2" :messages="$errors->get('nombre_encuesta')"/>
    </div>
    <div>
        <x-label for="fecha_creacion" :value="__('Fecha Creacion')"/>
        <x-input id="fecha_creacion" name="fecha_creacion" type="text" class="mt-1 block w-full" :value="old('fecha_creacion', $encuesta?->fecha_creacion)" autocomplete="fecha_creacion" placeholder="Fecha Creacion"/>
        <x-input-error for="fecha_creacion" class="mt-2" :messages="$errors->get('fecha_creacion')"/>
    </div>
    <div>
        <x-label for="creado_por" :value="__('Creado Por')"/>
        <x-input id="creado_por" name="creado_por" type="text" class="mt-1 block w-full" :value="old('creado_por', $encuesta?->creado_por)" autocomplete="creado_por" placeholder="Creado Por"/>
        <x-input-error for="creado_por" class="mt-2" :messages="$errors->get('creado_por')"/>
    </div>
    <div>
        <x-label for="enlace_encuesta" :value="__('Enlace Encuesta')"/>
        <x-input id="enlace_encuesta" name="enlace_encuesta" type="text" class="mt-1 block w-full" :value="old('enlace_encuesta', $encuesta?->enlace_encuesta)" autocomplete="enlace_encuesta" placeholder="Enlace Encuesta"/>
        <x-input-error for="enlace_encuesta" class="mt-2" :messages="$errors->get('enlace_encuesta')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button>Submit</x-primary-button>
    </div>
</div>