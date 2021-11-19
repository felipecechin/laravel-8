<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller {
    public function index() {
        $fornecedores = [['nome' => 'Fornecedor 1', 'status' => 'N', 'cnpj' => '0'],
            ['nome' => 'Fornecedor 2', 'status' => 'N', 'ddd' => '55', 'telefone' => '997052340'],
            ['nome' => 'Fornecedor 3', 'status' => 'N', 'ddd' => '57']
        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
