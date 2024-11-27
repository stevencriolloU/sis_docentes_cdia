<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 *
 * @property $id
 * @property $semestre
 * @property $paralelo
 * @property $created_at
 * @property $updated_at
 *
 * @property Asignatura[] $asignaturas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Curso extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['semestre', 'paralelo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaturas()
    {
        return $this->hasMany(\App\Models\Asignatura::class, 'id', 'id_curso');
    }
    
}
