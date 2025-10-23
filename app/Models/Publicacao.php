<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Publicacao extends Model {

      use HasFactory;
           protected $table = 'publicacoes';
           protected $fillable =['titulo','conteudo','usuario_id','empresa_id','imagem'];
           public function usuario(){ return $this->belongsTo(Usuario::class,'usuario_id'); }
           public function empresa(){ return $this->belongsTo(Empresa::class,'empresa_id'); }
           public function comentarios(){ return $this->hasMany(Comentario::class,'publicacao_id'); }
           public function likes(){ return $this->hasMany(Like::class,'publicacao_id'); }
           public function deslikes(){ return $this->hasMany(Deslike::class,'publicacao_id'); }
}
