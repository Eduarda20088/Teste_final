<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('publicacao_id')->constrained('publicacoes')->onDelete('cascade');
            $table->text('conteudo');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('comentarios');
    }
};

