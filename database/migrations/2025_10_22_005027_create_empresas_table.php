<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

   return new class extends Migration {
       public function up(): void {
          Schema::create('empresas', function (Blueprint $table) {
          $table->id();
          $table->string('nome', 100);
          $table->string('cnpj', 20)->nullable()->unique();
          $table->string('logo')->nullable();
          $table->text('descricao')->nullable();
          $table->timestamps();
     });
 }
      public function down(): void {
       Schema::dropIfExists('empresas');
 }
};
