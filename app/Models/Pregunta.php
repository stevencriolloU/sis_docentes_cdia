<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pregunta
 *
 * @property $id
 * @property $id_encuesta
 * @property $texto_pregunta
 * @property $Type
 * @property $created_at
 * @property $updated_at
 *
 * @property Encuesta $encuesta
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
    protected $fillable = ['id_encuesta', 'texto_pregunta', 'Type'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function encuesta()
    {
        return $this->belongsTo(\App\Models\Encuesta::class, 'id_encuesta', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respuestas()
    {
        return $this->hasMany(\App\Models\Respuesta::class, 'id', 'id_pregunta');
    }
    
}
