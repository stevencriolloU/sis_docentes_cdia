
<div class="container">
    <h1>Respuestas de la Encuesta: {{ $encuesta->nombre_encuesta }}</h1>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pregunta</th>
                <th>Respuestas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($encuesta->preguntas as $pregunta)            
                <tr>
                    <td>{{ $pregunta->enunciado }}</td>
                    <td>
                        <ul>
                            @foreach($pregunta->respuestas as $respuesta)
                                <li>                                    
                                    {{ $respuesta->opcion->opcion }}                                     
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
