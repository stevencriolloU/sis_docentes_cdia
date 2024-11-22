<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 *
 * @property $id
 * @property $nombre_curso
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Cursoparalelo[] $cursoparalelos
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
    protected $fillable = ['nombre_curso', 'descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursoparalelos()
    {
        return $this->hasMany(\App\Models\Cursoparalelo::class, 'id', 'id_curso');
    }
    
}
