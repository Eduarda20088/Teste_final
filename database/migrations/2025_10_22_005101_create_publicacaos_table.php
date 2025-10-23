<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
  
return new class extends Migration {
   public function up(){
Schema::create('publicacoes', function (Blueprint $table) {
$table->id();

$table->string('titulo',150);
$table->text('conteudo');
$table->unsignedBigInteger('usuario_id');
$table->unsignedBigInteger('empresa_id')->nullable();
$table->string('imagem')->nullable();
$table->timestamps();
$table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
$table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
});
}
public function down(){ Schema::dropIfExists('publicacoes'); }
};
