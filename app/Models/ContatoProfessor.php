<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContatoProfessor extends Model
{
    use HasFactory;

    protected $table = 'contato_professor';
    protected $fillable = ['professor_id', 'email', 'telefone'];

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id');
    }
}
