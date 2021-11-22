<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //        $contato = new SiteContato();
        //        $contato->nome = 'Contato 1';
        //        $contato->telefone = '(55) 99844-3333';
        //        $contato->email = 'contato@contato.com.br';
        //        $contato->motivo_contato = 1;
        //        $contato->mensagem = 'Seja bem vindo.';
        //        $contato->save();
        SiteContato::factory(10)->create();
    }
}
