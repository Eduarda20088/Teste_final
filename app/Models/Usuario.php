<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $fillable = ['nome','email','senha','foto'];
    protected $hidden = ['senha'];

    public function publicacoes() { 
        return $this->hasMany(Publicacao::class); 
    }
    public function comentarios() { 
        return $this->hasMany(Comentario::class); 
    }
    public function likes() { 
        return $this->hasMany(Like::class); 
    }
    public function deslikes() { 
        return $this->hasMany(Deslike::class); 
    }
    public function avaliacoes() { 
        return $this->hasMany(Avaliacao::class); 
    }
}
