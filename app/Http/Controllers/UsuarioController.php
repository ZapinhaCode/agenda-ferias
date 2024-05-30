<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UsuarioRepository;

class UsuarioController {
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository) {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function index() {
        // Mostra a tela inicial dos usuarios
        $usuarios = $this->usuarioRepository->all();
        return view('usuario.index', compact('usuarios'));
    }

    public function create() {
        // Mostra a tela para criar o usuario
        return view('usuario.adicionar');
    }

    public function store(Request $request) {
        dd($request->all());
        // Salvar um novo usuário
    }

    public function show($id) {
        // Mostrar um usuário específico
        dd('rota de editar');
    }

    public function edit($id) {
        // Mostrar formulário para editar um usuário
    }

    public function update(Request $request, $id) {
        // Atualizar um usuário específico
    }

    public function destroy($id) {
        // Deletar um usuário específico
        dd('rota de excluir');
    }
}