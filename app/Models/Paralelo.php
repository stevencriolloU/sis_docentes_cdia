<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paralelo
 *
 * @property $id
 * @property $nombre_paralelo
 * @property $created_at
 * @property $updated_at
 *
 * @property Cursoparalelo[] $cursoparalelos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paralelo extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre_paralelo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursoparalelos()
    {
        return $this->hasMany(\App\Models\Cursoparalelo::class, 'id', 'id_paralelo');
    }
    
}
