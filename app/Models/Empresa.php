<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        'nome',
        'imagem',
        'descricao'
    ];

    public function publicacoes()
    {
        return $this->hasMany(Publicacao::class, 'empresa_id');
    }

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class, 'empresa_id');
    }
}
