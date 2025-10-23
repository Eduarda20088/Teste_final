<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
    
return new class extends Migration {
       public function up(){
         Schema::create('comentarios', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('publicacao_id');
         $table->unsignedBigInteger('usuario_id');
         $table->text('comentario');
         $table->timestamps();
         $table->foreign('publicacao_id')->references('id')->on('publicacoes')->onDelete('cascade');
        $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
           });
}
       public function down(){ Schema::dropIfExists('comentarios'); }
};
