<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Encuesta
 *
 * @property $id
 * @property $id_registro_clase
 * @property $fecha_creacion
 * @property $estado
 * @property $enlace_encuesta
 * @property $created_at
 * @property $updated_at
 *
 * @property Clase $clase
 * @property Pregunta[] $preguntas
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
    protected $fillable = ['id_registro_clase', 'fecha_creacion', 'estado', 'enlace_encuesta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clase()
    {
        return $this->belongsTo(\App\Models\Clase::class, 'id_registro_clase', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preguntas()
    {
        return $this->hasMany(\App\Models\Pregunta::class, 'id', 'id_encuesta');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respuestas()
    {
        return $this->hasMany(\App\Models\Respuesta::class, 'id', 'id_encuesta');
    }
    
}
