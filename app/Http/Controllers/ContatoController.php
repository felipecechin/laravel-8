<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller {
    public function contato(Request $request) {
        //        echo '<pre>';
        //        print_r($request->all());
        //        echo '</pre>';
        //        echo $request->input('nome');

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        $contato->save();
*/
        //        $contato = new SiteContato();
        //        $contato->create($request->all());

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O campo nome precisa ser único',
            'email.email' => 'O email informado não é válido',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
