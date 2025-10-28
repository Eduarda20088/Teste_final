<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deslike extends Model {

   use HasFactory;
    protected $table = 'deslikes';
    protected $fillable = ['usuario_id','publicacao_id'];

   public function usuario() { 
    return $this->belongsTo(Usuario::class); 
}
   public function publicacao() { 
    return $this->belongsTo(Publicacao::class); 
}
}
