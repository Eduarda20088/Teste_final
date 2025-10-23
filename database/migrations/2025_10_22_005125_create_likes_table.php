<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

        return new class extends Migration {
            public function up(){
                 Schema::create('likes', function (Blueprint $table) {
                    $table->id();
                    $table->unsignedBigInteger('usuario_id');
                    $table->unsignedBigInteger('publicacao_id');
                    $table->timestamps();
                    $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
                    $table->foreign('publicacao_id')->references('id')->on('publicacoes')->onDelete('cascade');
                    $table->unique(['usuario_id','publicacao_id']);
          });
}
public function down(){ Schema::dropIfExists('likes'); }
};

