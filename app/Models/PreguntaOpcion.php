<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PreguntaOpcion
 *
 * @property $id
 * @property $pregunta_id
 * @property $opcion_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Opcione $opcione
 * @property Pregunta $pregunta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PreguntaOpcion extends Model
{
    
    protected $table = 'pregunta_opcion';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['pregunta_id', 'opcion_id'];


    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }

    public function opcion()
    {
        return $this->belongsTo(Opcione::class);
    }
    
}
