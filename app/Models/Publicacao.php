<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table = 'publicacoes';
    protected $fillable = ['usuario_id', 'conteudo', 'imagem', 'likes', 'deslikes'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'publicacao_id');
    }

    public function getImagemUrlAttribute()
    {
        return $this->imagem ? asset('storage/publicacoes/'.$this->imagem) : null;
    }
}

