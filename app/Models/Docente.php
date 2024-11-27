<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Docente
 *
 * @property $id
 * @property $id_usuario
 * @property $contrato
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Asignatura[] $asignaturas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Docente extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_usuario', 'contrato'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_usuario', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaturas()
    {
        return $this->hasMany(\App\Models\Asignatura::class, 'id', 'id_docente');
    }
    
}
