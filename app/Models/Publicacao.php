<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table = 'publicacoes';

    protected $fillable = [
        'titulo',
        'imagem',
        'local',
        'cidade',
        'empresa_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'publicacao_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'publicacao_id');
    }

    public function deslikes()
    {
        return $this->hasMany(Deslike::class, 'publicacao_id');
    }
}

