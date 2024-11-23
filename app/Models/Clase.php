<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Clase
 *
 * @property $id
 * @property $id_docente
 * @property $hora_inicio
 * @property $hora_fin
 * @property $created_at
 * @property $updated_at
 *
 * @property Docente $docente
 * @property Encuesta[] $encuestas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Clase extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_docente', 'hora_inicio', 'hora_fin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function docente()
    {
        return $this->belongsTo(\App\Models\Docente::class, 'id_docente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function encuestas()
    {
        return $this->hasMany(\App\Models\Encuesta::class, 'id', 'id_registro_clase');
    }
    
}
