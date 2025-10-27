<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model {

    use HasFactory;

        protected $table = 'publicacoes';
        protected $fillable = ['titulo','conteudo','imagem','local','cidade','usuario_id','empresa_id'];

         public function usuario() { 
          return $this->belongsTo(Usuario::class); 
        }
         public function empresa() { 
          return $this->belongsTo(Empresa::class); 
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
}
