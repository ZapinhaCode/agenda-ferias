<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FeriasRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Ferias;

class FeriasController extends Controller
{
    public function index() {
        // Mostra a tela inicial dos usuarios

        // $usuarios = $this->usuarioRepository->all();
        return view('ferias.index');
    }

    public function create() {
        // Mostra a tela para criar as ferias

        return view('ferias.adicionar');
    }

    public function store(FeriasRequest $request) {
        // Grava no banco as ferias

        DB::beginTransaction();

        try {
            $request->validated();
            $ferias = new Ferias($request->all());
            // Salvar qual usuário requeriu as ferias
            $ferias->save();
            DB::commit();
            return redirect()->route('ferias.lista')->with('sucesso', 'Férias criada com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao tentar criar férias, verifique e tente novamente!');
        }
    }

    public function show() {
        // Mostra uma ferias específica
    }

    public function edit() {
        // Mostrar formulário para editar uma ferias

        return view('ferias.alterar');
    }

    public function update(FeriasRequest $request, $id) {
        // Atualiza uma ferias no banco de dados
        DB::beginTransaction();

        try {
            $request->validated();
            $ferias = Ferias::findOrFail($id);
            $ferias->update($request->all());
            DB::commit();
            return redirect()->route('ferias.lista')->with('sucesso', 'Férias alterada com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao atualizar férias, verifique e tente novamente!');
        }
    }

    public function destroy($id) {
        // Deleta uma ferias do banco de dados

        DB::beginTransaction();

        try {
            $ferias = Ferias::findOrFail($id);
            $ferias->delete();
            DB::commit();
            return redirect()->route('ferias.lista')->with('sucesso', 'Férias deletada do sistema com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao eliminar férias, verifique e tente novamente!');
        }
    }

    public function admSolicitacoes() {
        // Verifica adm as solicitacoes

        return view('admSolicitacoes.index');
    }
}
