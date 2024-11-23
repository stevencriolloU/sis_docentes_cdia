<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Periodo
 *
 * @property $id
 * @property $periodo_inicio
 * @property $periodo_fin
 * @property $created_at
 * @property $updated_at
 *
 * @property Docente[] $docentes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Periodo extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['periodo_inicio', 'periodo_fin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docentes()
    {
        return $this->hasMany(\App\Models\Docente::class, 'id', 'id_periodo');
    }
    
}
