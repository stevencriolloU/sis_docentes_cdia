<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cursoparalelo
 *
 * @property $id
 * @property $id_curso
 * @property $id_paralelo
 * @property $created_at
 * @property $updated_at
 *
 * @property Curso $curso
 * @property Paralelo $paralelo
 * @property Docente[] $docentes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cursoparalelo extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_curso', 'id_paralelo'];


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
    public function paralelo()
    {
        return $this->belongsTo(\App\Models\Paralelo::class, 'id_paralelo', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docentes()
    {
        return $this->hasMany(\App\Models\Docente::class, 'id', 'id_curso_paralelo');
    }
    
}
