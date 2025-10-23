<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
     class Empresa extends Model
   {
       use HasFactory;
         protected $table = 'empresas';
         protected $fillable = ['nome','cnpj','descricao','logo'];
         public function publicacoes(){ return $this->hasMany(Publicacao::class,'empresa_id'); }
}
