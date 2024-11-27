<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asignatura
 *
 * @property $id
 * @property $id_docente
 * @property $id_curso
 * @property $nombre_asignatura
 * @property $periodo
 * @property $created_at
 * @property $updated_at
 *
 * @property Curso $curso
 * @property Docente $docente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asignatura extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_docente', 'id_curso', 'nombre_asignatura', 'periodo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function curso()
    {
        return $this->belongsTo(\App\Models\Curso::class, 'id_curso', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function docente()
    {
        return $this->belongsTo(\App\Models\Docente::class, 'id_docente', 'id');
    }
    
}
