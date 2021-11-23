<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller {

    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->get('nome') . '%')
            ->where('site', 'like', '%' . $request->get('site') . '%')
            ->where('uf', 'like', '%' . $request->get('uf') . '%')
            ->where('email', 'like', '%' . $request->get('email') . '%')
            ->paginate(2);

        $fornecedores->appends($request->all());

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request) {
        $msg = '';
        if ($request->input('_token') != '' && $request->input('id') == '') {


            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'email' => 'email',
                'uf' => 'required|min:2|max:2'
            ];

            $feedback = [
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
                'email.email' => 'O email informado não é válido',
                'required' => 'O campo :attribute deve ser preenchido',
                'uf.min' => 'O campo UF precisa ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF precisa ter no máximo 2 caracteres',
            ];

            $request->validate($regras, $feedback);

            Fornecedor::create($request->all());

            $msg = 'Cadastro realizado com sucesso';
        }

        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = 'Registro atualizado';
            } else {
                $msg = 'Erro ao editar registro';
            }
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);

        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '') {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id) {
        Fornecedor::find($id)->forceDelete();

        return redirect()->route('app.fornecedor');
    }
}
