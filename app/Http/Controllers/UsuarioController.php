<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UsuarioRepository;
use App\Models\User;
use App\Models\Estado;
use App\Models\Cidade;
use App\Models\Setores;
use App\Models\Cargo;

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

        $cargos = Cargo::all();
        $setores = Setores::all();
        $estados = Estado::all();
        $cidades = Cidade::all();
        return view('usuario.adicionar', compact('cargos', 'setores', 'estados', 'cidades'));
    }

    public function store(Request $request) {
        // Salvar um novo usuário

        $usuario = new User($request->all());
        $usuario->password = bcrypt($request->password); // Criptografa a senha
        $usuario->save();
        return redirect()->route('usuario.lista', $usuario->id)->with('success', 'Usuário criado com sucesso!');
    }

    public function show($id) {
        // Mostrar um usuário específico
    }

    public function edit($id) {
        // Mostrar formulário para editar um usuário

        $usuario = User::findOrFail($id);
        $cargos = Cargo::all();
        $setores = Setores::all();
        $estados = Estado::all();
        $cidades = Cidade::all();
        // dd($usuario);
        return view('usuario.alterar', compact('usuario', 'cargos', 'setores', 'estados', 'cidades',));
    }

    public function update(Request $request, $id) {
        // Atualizar um usuário específico

        $usuario = User::findOrFail($id);
        dd('atualiza');
        $usuario->update($request->all());
    }

    public function destroy($id) {
        // Deletar um usuário específico
        dd('rota de excluir');
    }
}