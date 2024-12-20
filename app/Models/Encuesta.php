<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Encuesta
 *
 * @property $id
 * @property $id_asignatura
 * @property $nombre_encuesta
 * @property $fecha_creacion
 * @property $creado_por
 * @property $uuid
 * @property $enlace_encuesta
 * @property $created_at
 * @property $updated_at
 *
 * @property Docente $docente
 * @property Asignatura $asignatura
 * @property EncuestaPreguntum[] $encuestaPreguntas
 * @property Respuesta[] $respuestas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Encuesta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_asignatura', 'nombre_encuesta', 'fecha_creacion', 'creado_por','uuid', 'enlace_encuesta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function docente()
    {
        return $this->belongsTo(\App\Models\Docente::class, 'creado_por', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asignatura()
    {
        return $this->belongsTo(\App\Models\Asignatura::class, 'id_asignatura', 'id');
    }
    
    /**
     * Relación muchos a muchos con el modelo Pregunta.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function preguntas()
    {
        return $this->belongsToMany(Pregunta::class, 'encuesta_pregunta', 'encuesta_id', 'pregunta_id');
    }

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respuestas()
    {
        return $this->hasMany(\App\Models\Respuesta::class, 'id', 'id_encuesta');
    }
    
}
