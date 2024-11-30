<div class="space-y-6">
    
    <div>
        <x-label for="id_encuesta" :value="__('Id Encuesta')"/>
        <x-input id="id_encuesta" name="id_encuesta" type="text" class="mt-1 block w-full" :value="old('id_encuesta', $respuesta?->id_encuesta)" autocomplete="id_encuesta" placeholder="Id Encuesta"/>
        <x-input-error for="id_encuesta" class="mt-2" :messages="$errors->get('id_encuesta')"/>
    </div>
    <div>
        <x-label for="id_pregunta" :value="__('Id Pregunta')"/>
        <x-input id="id_pregunta" name="id_pregunta" type="text" class="mt-1 block w-full" :value="old('id_pregunta', $respuesta?->id_pregunta)" autocomplete="id_pregunta" placeholder="Id Pregunta"/>
        <x-input-error for="id_pregunta" class="mt-2" :messages="$errors->get('id_pregunta')"/>
    </div>
    <div>
        <x-label for="opcion_id" :value="__('Opcion Id')"/>
        <x-input id="opcion_id" name="opcion_id" type="text" class="mt-1 block w-full" :value="old('opcion_id', $respuesta?->opcion_id)" autocomplete="opcion_id" placeholder="Opcion Id"/>
        <x-input-error for="opcion_id" class="mt-2" :messages="$errors->get('opcion_id')"/>
    </div>
    <div>
        <x-label for="id_usuario" :value="__('Id Usuario')"/>
        <x-input id="id_usuario" name="id_usuario" type="text" class="mt-1 block w-full" :value="old('id_usuario', $respuesta?->id_usuario)" autocomplete="id_usuario" placeholder="Id Usuario"/>
        <x-input-error for="id_usuario" class="mt-2" :messages="$errors->get('id_usuario')"/>
    </div>
    <div>
        <x-label for="fecha_respuesta" :value="__('Fecha Respuesta')"/>
        <x-input id="fecha_respuesta" name="fecha_respuesta" type="text" class="mt-1 block w-full" :value="old('fecha_respuesta', $respuesta?->fecha_respuesta)" autocomplete="fecha_respuesta" placeholder="Fecha Respuesta"/>
        <x-input-error for="fecha_respuesta" class="mt-2" :messages="$errors->get('fecha_respuesta')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button>Submit</x-primary-button>
    </div>
</div>