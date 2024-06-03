<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SetorRequest;

class SetorController extends Controller
{
    public function index() {
        // Mostra a tela inicial dos setores

        return view('setor.index');
    }

    public function create() {
        // Mostra a tela para criar o setor

        return view('setor.adicionar');
    }

    public function store(Request $request) {
        // Salvar um novo setor

        dd($request->all());
    }

    public function show($id) {
        // Mostrar um setor específico


    }

    public function edit($id) {
        // Mostrar formulário para editar um setor

        return view('setor.alterar');
    }

    public function update(Request $request, $id) {
        // Atualizar um setor específico


    }

    public function destroy($id) {
        // Deletar um setor específico


    }
}
