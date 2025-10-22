<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('imagem')->nullable();
            $table->text('descricao')->nullable();
            $table->foreignId('usuario_id')->nullable()->constrained('usuarios')->onDelete('set null'); // opcional dono
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('empresas');
    }
};

