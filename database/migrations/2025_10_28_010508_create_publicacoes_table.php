<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('publicacoes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 150);
            $table->string('imagem')->nullable();
            $table->string('local', 100);
            $table->string('cidade', 100);
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('publicacoes');
    }
};
