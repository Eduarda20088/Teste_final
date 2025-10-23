<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
public function up(){
Schema::create('empresas', function (Blueprint $table) {
$table->id();
$table->string('nome',100);
$table->string('cnpj',20)->unique()->nullable();
$table->text('descricao')->nullable();
$table->string('logo')->nullable();
$table->timestamps();
});
}
public function down(){ Schema::dropIfExists('empresas'); }
};

