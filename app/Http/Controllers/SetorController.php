<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SetorRequest;
use App\Repositories\SetorRepository;
use App\Repositories\UsuarioRepository;
use App\Models\Setores;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

        DB::beginTransaction();

        try {
            $request->validated();
            $input = $request->all();
            $setor = new Setores($request->all());
            $usuario = User::findOrFail($input['gerente_user_id']);
            $setor->save();
            if (is_null($usuario->setor_id)) {
                $usuario->setor_id = $setor->id;
                $usuario->save();
            }
            DB::commit();
            return redirect()->route('adm.setor.lista')->with('sucesso', 'Setor criado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao criar novo setor, verifique e tente novamente!');
        }
    }

    public function edit($id) {
        // Mostrar formulário para editar um setor
        $setor = Setores::findOrFail($id);
        $gerentes = $this->usuarioRepository->listaGerente();
        return view('setor.alterar', compact('setor', 'gerentes'));
    }

    public function update(SetorRequest $request, $id) {
        // Atualizar um setor específico

        DB::beginTransaction();

        try {
            $request->validated();
            $setor = Setores::findOrFail($id);
            $setor->update($request->all());
            DB::commit();
            return redirect()->route('adm.setor.lista')->with('sucesso', 'Setor alterado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao atualizar setor, verifique e tente novamente!');
        }
    }

    public function destroy($id) {
        // Deletar um setor específico

        DB::beginTransaction();

        try {
            $setor = Setores::findOrFail($id);
            $usuario = User::findOrFail($setor->gerente_user_id);
            if (!is_null($usuario)) {
                $usuario->setor_id = null;
            }
            $usuario->save();
            $setor->delete();
            DB::commit();
            return redirect()->route('adm.setor.lista')->with('sucesso', 'Setor deletado do sistema com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao excluir setor, verifique e tente novamente!');
        }
    }
}
