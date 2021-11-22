<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'site.com.br';
        $fornecedor->uf = 'RS';
        $fornecedor->email = 'contato@site.com';
        $fornecedor->save();

        //atributo fillable
        Fornecedor::create(['nome' => 'Fornecedor', 'site' => 'site.com', 'uf' => 'RS', 'email' => 'contato@site2.com.br']);

        DB::table('fornecedores')->insert(
            ['nome' => 'Fornecedor 300', 'site' => 'site300.com', 'uf' => 'RS', 'email' => 'contato@site300.com.br']
        );
    }
}
