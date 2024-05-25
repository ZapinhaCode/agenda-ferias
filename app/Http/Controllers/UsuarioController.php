<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsuarioController
{
    public function index() {
        // Mostra a tela inicial dos usuarios
        return view('usuario.index');
    }

    public function create() {
        // Mostra a tela para criar o usuario
        return view('usuario.adicionar');
    }

    public function store(Request $request) {
        // Salvar um novo usuário
    }

    public function show($id) {
        // Mostrar um usuário específico
    }

    public function edit($id) {
        // Mostrar formulário para editar um usuário
    }

    public function update(Request $request, $id) {
        // Atualizar um usuário específico
    }

    public function destroy($id) {
        // Deletar um usuário específico
    }

    //tendel dos guri 

}