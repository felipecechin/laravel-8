<?php

namespace App\Http\Middleware;

use Closure;
use http\Client\Response;
use Illuminate\Http\Request;

class AutenticacaoMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil) {

        echo $metodo_autenticacao . ' - ' . $perfil;

        if ($metodo_autenticacao == 'padrao') {
            echo 'Verificar usuário e senha no banco de dados';
        }

        if ($metodo_autenticacao == 'ldap') {
            echo 'Verificar o usuário e senha no AD';
        }

        if ($perfil == 'visitante') {
            echo 'Exibir apenas alguns recursos';
        } else {
            echo 'Outros recursos';
        }

        if (false) {
            return $next($request);
        } else {
            return Response('Acesso negado! Rota exige autenticação');
        }
    }
}
