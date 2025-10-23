<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
class Usuario extends Model {
                          
      use HasFactory;
               protected $table = 'usuarios';
               protected $fillable = ['nome','email','senha','avatar'];
               protected $hidden = ['senha'];


                public function setSenhaAttribute($value){
                $this->attributes['senha'] = Hash::needsRehash($value) ?
                Hash::make($value) : $value;
         }
          public function publicacoes(){ return $this->hasMany(Publicacao::class,'usuario_id'); }
          public function comentarios(){ return $this->hasMany(Comentario::class,'usuario_id'); }
          public function likes(){ return $this->hasMany(Like::class,'usuario_id'); }
          public function deslikes(){ return $this->hasMany(Deslike::class,'usuario_id'); }
}
