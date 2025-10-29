<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';
    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'publicacao_id',
        'texto',
        'criado_em'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function publicacao()
    {
        return $this->belongsTo(Publicacao::class, 'publicacao_id');
    }
}
