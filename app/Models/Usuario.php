<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'foto'
    ];

    protected $hidden = ['senha'];

    public $timestamps = true;

    public function publicacoes()
    {
        return $this->hasMany(Publicacao::class, 'usuario_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'usuario_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'usuario_id');
    }

    public function deslikes()
    {
        return $this->hasMany(Deslike::class, 'usuario_id');
    }

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class, 'usuario_id');
    }
}
