<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('publicacao_id')->constrained('publicacoes')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['usuario_id','publicacao_id']); // evita same user dar like duplicado
        });
    }

    public function down(): void {
        Schema::dropIfExists('likes');
    }
};
