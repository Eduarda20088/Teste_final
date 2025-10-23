<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Deslike extends Model
{
use HasFactory;
protected $table = 'deslikes';
protected $fillable = ['usuario_id','publicacao_id'];
}