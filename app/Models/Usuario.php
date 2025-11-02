<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['nome', 'email', 'senha', 'foto'];
    protected $hidden = ['senha'];

    public function publicacoes()
    {
        return $this->hasMany(Publicacao::class, 'usuario_id');
    }

    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : asset('images/default-user.png');
    }
}
