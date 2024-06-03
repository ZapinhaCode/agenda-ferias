<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SetorRequest;
use App\Repositories\SetorRepository;
use App\Repositories\UsuarioRepository;
use App\Models\Setores;
use App\Models\User;

class SetorController extends Controller {
    private $usuarioRepository;
    private $setoresRepository;

    public function __construct(UsuarioRepository $usuarioRepository, Setores $setoresRepository) {
        $this->usuarioRepository = $usuarioRepository;
        $this->setoresRepository = $setoresRepository;
    }

    public function index() {
        // Mostra a tela inicial dos setores

        $setores = $this->setoresRepository->all();
        return view('setor.index', compact('setores'));
    }

    public function create() {
        // Mostra a tela para criar o setor

        $gerentes = $this->usuarioRepository->listaGerente();
        return view('setor.adicionar', compact('gerentes'));
    }

    public function store(SetorRequest $request) {
        // Salvar um novo setor

        $request->validated();
        $setor = new Setores($request->all());
        $setor->save();
        return redirect()->route('setor.lista')->with('sucesso', 'Setor criado com sucesso!');
    }

    public function show($id) {
        // Mostrar um setor específico


    }

    public function edit($id) {
        // Mostrar formulário para editar um setor
        $setor = Setores::findOrFail($id);
        $gerentes = $this->usuarioRepository->listaGerente();
        return view('setor.alterar', compact('setor', 'gerentes'));
    }

    public function update(Request $request, $id) {
        // Atualizar um setor específico

        $setor = Setores::findOrFail($id);
        $setor->update($request->all());
        return redirect()->route('setor.lista')->with('sucesso', 'Setor alterado com sucesso!');
    }

    public function destroy($id) {
        // Deletar um setor específico

        $setor = Setores::findOrFail($id);
        $setor->delete();
        return redirect()->route('setor.lista')->with('sucesso', 'Setor deletado do sistema com sucesso!');
    }
}
