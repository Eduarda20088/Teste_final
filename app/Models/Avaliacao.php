<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacoes';
    protected $fillable = ['usuario_id','empresa_id','nota','comentario', ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
