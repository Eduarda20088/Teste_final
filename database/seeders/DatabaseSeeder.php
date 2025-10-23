<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Empresa;
use App\Models\Publicacao;

class DatabaseSeeder extends Seeder {

 public function run() {
           Usuario::create(['nome'=>'usuario_01','email'=>'user1@example.com','senha'=>'12345678']);
           Empresa::create(['nome'=>'Sabor do Brasil','cnpj'=>'00.000.000/0001-00','descricao'=>'Empresa exemplo']);
           Publicacao::create(['titulo'=>'Prato 01','conteudo'=>'Descrição do prato 1','usuario_id'=>1,'empresa_id'=>1]);
           Publicacao::create(['titulo'=>'Prato 02','conteudo'=>'Descrição do prato 2','usuario_id'=>1,'empresa_id'=>1]);
}
}
