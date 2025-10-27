<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

  return new class extends Migration {
      public function up(): void {
         Schema::create('publicacoes', function (Blueprint $table) {
         $table->id();
         $table->string('titulo', 150);
         $table->text('conteudo')->nullable();
         $table->string('imagem')->nullable();
         $table->string('local', 150)->nullable();
         $table->string('cidade', 100)->nullable();
         $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
         $table->foreignId('empresa_id')->nullable()->constrained('empresas')->onDelete('cascade');
         $table->timestamps();
     });
 }
     public function down(): void {
         Schema::dropIfExists('publicacoes');
 }
};
