<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table = 'publicacoes';
    protected $fillable = ['usuario_id', 'conteudo', 'imagem'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
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
