<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
        
     protected $table = 'professores';
    protected $fillable = ['nome', 'disciplina', 'email', 'foto'];

    public function contatos()
    {
        return $this->hasMany(ContatoProfessor::class, 'professor_id');
    }
}
