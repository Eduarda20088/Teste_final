<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';
    protected $fillable = ['publicacao_id', 'usuario_id', 'conteudo', 'criado_em'];

    public $timestamps = false; // se sua migration usa 'criado_em' em vez de created_at

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
