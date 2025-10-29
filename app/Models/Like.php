<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'publicacao_id'
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
