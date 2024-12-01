<form method="POST" action="{{ route('respuestas.store', $encuesta->uuid) }}">
    @csrf

    <h1 class="text-xl font-bold">{{ $encuesta->nombre_encuesta }}</h1>

    @foreach ($encuesta->preguntas as $pregunta)
        <div class="my-4 border p-4 rounded">
            <h3 class="font-semibold">{{ $pregunta->enunciado }}</h3>
            @foreach ($pregunta->opciones as $opcion)
                <div>
                    <input type="radio" id="opcion_{{ $opcion->id }}" name="preguntas[{{ $pregunta->id }}]"
                           value="{{ $opcion->id }}" required>
                    <label for="opcion_{{ $opcion->id }}">{{ $opcion->opcion }}</label>
                </div>
            @endforeach
        </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Enviar Respuestas</button>
</form>
