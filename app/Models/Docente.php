<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Docente
 *
 * @property $id
 * @property $id_curso_paralelo
 * @property $id_periodo
 * @property $id_usuario
 * @property $created_at
 * @property $updated_at
 *
 * @property Cursoparalelo $cursoparalelo
 * @property Periodo $periodo
 * @property User $user
 * @property Clase[] $clases
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
    protected $fillable = ['id_curso_paralelo', 'id_periodo', 'id_usuario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cursoparalelo()
    {
        return $this->belongsTo(\App\Models\Cursoparalelo::class, 'id_curso_paralelo', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodo()
    {
        return $this->belongsTo(\App\Models\Periodo::class, 'id_periodo', 'id');
    }
    
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
    public function clases()
    {
        return $this->hasMany(\App\Models\Clase::class, 'id', 'id_docente');
    }
    
}
