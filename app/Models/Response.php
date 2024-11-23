<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['survey_id', 'answers'];

    /**
     * Relación con la encuesta correspondiente.
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}

