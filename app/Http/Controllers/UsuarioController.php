<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UsuarioRepository;
use App\Models\User;
use App\Models\Estado;
use App\Models\Cidade;
use App\Models\Setores;
use App\Models\Cargo;
use App\Http\Requests\UsuarioRequest;

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

    public function store(UsuarioRequest $request) {
        // Salvar um novo usuário

        $request->validated();
        $usuario = new User($request->all());
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return redirect()->route('usuario.lista')->with('sucesso', 'Funcionário criado com sucesso!');
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
        return view('usuario.alterar', compact('usuario', 'cargos', 'setores', 'estados', 'cidades',));
    }

    public function update(Request $request, $id) {
        // Atualizar um usuário específico

        $usuario = User::findOrFail($id);
        $usuario->update($request->all());
        return redirect()->route('usuario.lista')->with('sucesso', 'Funcionário alterado com sucesso!');
    }

    public function destroy($id) {
        // Deletar um usuário específico

        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuario.lista')->with('sucesso', 'Funcionário deletado do sistema com sucesso!');
    }
}