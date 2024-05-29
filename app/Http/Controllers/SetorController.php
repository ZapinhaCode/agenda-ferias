<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index() {
        // Mostra a tela inicial dos setores
    }

    public function create() {
        // Mostra a tela para criar o setor
    }

    public function store(Request $request) {
        dd($request->all());
        // Salvar um novo setor
    }

    public function show($id) {
        // Mostrar um setor específico
    }

    public function edit($id) {
        // Mostrar formulário para editar um setor
    }

    public function update(Request $request, $id) {
        // Atualizar um setor específico
    }

    public function destroy($id) {
        // Deletar um setor específico
    }
}
