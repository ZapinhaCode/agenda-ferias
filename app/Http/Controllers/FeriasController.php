<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FeriasRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Ferias;
use App\Repositories\FeriasRepository;

class FeriasController extends Controller
{
    private $feriasRepository;

    public function __construct(FeriasRepository $feriasRepository) {
        $this->feriasRepository = $feriasRepository;
    }

    public function index() {
        // Mostra a tela inicial dos usuarios

        $ferias = $this->feriasRepository->minhasSolicitacoes();
        return view('ferias.index', compact('ferias'));
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
            $ferias->user_id = auth()->user()->id;            
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

    public function edit($id) {
        // Mostrar formulário para editar uma ferias

        $ferias = Ferias::findOrFail($id);
        return view('ferias.alterar', compact('ferias'));
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

        $ferias = $this->feriasRepository->solicitacoesAdministrativa();
        return view('admSolicitacoes.index', compact('ferias'));
    }
}
