<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissaoFuncionario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->cargo->permissao != 'administrador') {
            return redirect()->route('telaInicial')->with('error', 'Você não tem permissão para acessar esta página');
        } else {
            return $next($request);
        }
    }
}