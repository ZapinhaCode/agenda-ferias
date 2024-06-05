<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeriasController extends Controller
{
    public function index() {
        // Mostra a tela inicial dos usuarios

        // $usuarios = $this->usuarioRepository->all();
        return view('ferias.index');
    }

    public function admSolicitacoes() {
        // Verifica adm as solicitacoes

        return view('admSolicitacoes.index');
    }
}
