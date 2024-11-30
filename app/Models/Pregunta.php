<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pregunta
 *
 * @property $id
 * @property $enunciado
 * @property $tipo_pregunta
 * @property $escala
 * @property $created_at
 * @property $updated_at
 *
 * @property EncuestaPreguntum[] $encuestaPreguntas
 * @property PreguntaOpcion[] $preguntaOpcions
 * @property Respuesta[] $respuestas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pregunta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['enunciado', 'tipo_pregunta', 'escala'];


    public function opciones()
    {
        return $this->belongsToMany(Opcione::class, 'pregunta_opcion', 'pregunta_id', 'opcion_id')
                    ->withTimestamps();
    }

    /**
     * Relación muchos a muchos con el modelo Encuesta.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function encuestas()
    {
        return $this->belongsToMany(Encuesta::class, 'encuesta_pregunta', 'pregunta_id', 'encuesta_id');
    }

    // Relación con Respuesta (Una pregunta puede tener muchas respuestas)
    public function respuestas()
    {
        return $this->hasMany(Respuesta::class, 'id_pregunta');
    }
    

}
