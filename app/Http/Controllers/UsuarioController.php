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
use App\Http\Requests\AtualizaSenhaRequest;
use App\Http\Requests\AtualizaUsuarioRequest;
use Illuminate\Support\Facades\DB;

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

        DB::beginTransaction();

        try {
            $request->validated();
            $usuario = new User($request->all());
            $usuario->password = bcrypt($request->password);
            $usuario->save();
            DB::commit();
            return redirect()->route('adm.usuario.lista')->with('sucesso', 'Funcionário criado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Possível cadastro de funcionário duplicado ou informações incorretas, verifique e tente novamente!');
        }
    }

    public function show($id) {
        // Mostrar um usuário específico
        $usuario = User::findOrFail($id);
        $cargos = Cargo::all();
        $setores = Setores::all();
        $estados = Estado::all();
        $cidades = Cidade::all();
        return view('usuario.detalhesUsuario', compact('usuario', 'cargos', 'setores', 'estados', 'cidades'));
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

    public function update(AtualizaUsuarioRequest $request, $id) {
        // Atualizar um usuário específico

        DB::beginTransaction();

        try {
            $request->validated();
            $usuario = User::findOrFail($id);
            $usuario->update($request->all());
            DB::commit();
            return redirect()->route('adm.usuario.lista')->with('sucesso', 'Funcionário alterado com sucesso!');
        }  catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao atualizar o cadastro do funcionário, verifique e tente novamente!');
        }
    }

    public function destroy($id) {
        // Deletar um usuário específico

        DB::beginTransaction();

        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();
            DB::commit();
            return redirect()->route('adm.usuario.lista')->with('sucesso', 'Funcionário deletado do sistema com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao excluir o cadastro do funcionário, verifique e tente novamente!');
        }
    }

    public function visualizaMeuPerfil($id) {
        $usuario = User::findOrFail($id);
        $cargos = Cargo::all();
        $setores = Setores::all();
        $estados = Estado::all();
        $cidades = Cidade::all();
        return view('usuario.detalhesUsuario', compact('usuario', 'cargos', 'setores', 'estados', 'cidades'));
    }

    public function getAlteraSenhaPerfil($id) {
        // Mostra a tela para alterar a senha
        return view('usuario.alteraSenhaUsuario');
    }

    public function postAlteraSenhaPerfil(AtualizaSenhaRequest $request, $id) {
        // Salva no banco a senha nova

        DB::beginTransaction();
        try {
            $request->validated();
            $input = $request->all();
            $usuario = auth()->user();

            if ($input['password'] == $input['confirme_password']) {
                $usuarioSenha = $usuario->password;
                $senhaCriptografada = bcrypt($input['password']);
                $usuario->password = $senhaCriptografada;
                $usuario->save();                 
                DB::commit();
            }
            return redirect()->route('telaInicial')->with('sucesso', 'Alterado a senha do funcionário com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e . 'Erro ao atualizar a senha do funcionário, verifique e tente novamente!');
        }
    }
}