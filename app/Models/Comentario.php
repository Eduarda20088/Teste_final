<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model{
     
     use HasFactory;
        protected $table = 'comentarios';
        protected $fillable = ['publicacao_id','usuario_id','comentario'];
        public function usuario(){ return $this->belongsTo(Usuario::class,'usuario_id'); }
        public function publicacao(){ return $this->belongsTo(Publicacao::class,'publicacao_id'); }
}
