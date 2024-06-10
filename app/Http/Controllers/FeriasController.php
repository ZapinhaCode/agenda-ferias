<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FeriasRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Ferias;
use App\Repositories\FeriasRepository;
use Carbon\Carbon;

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

    public function enviaSolicitacao($id) {
        // Colocar o enviado_solicitacao = 1
        // Colocar o status = pendente

        DB::beginTransaction();

        try {
            $ferias = Ferias::findOrFail($id);
            $ferias->enviado_solicitacao = 1;
            $ferias->status = 'pendente';
            $ferias->update();
            DB::commit();
            return redirect()->route('ferias.lista')->with('sucesso', 'Férias enviadas para análise, a resposta sobre a solicitação será enviada por e-mail!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function admSolicitacoes() {
        // Verifica adm as solicitacoes

        $ferias = $this->feriasRepository->solicitacoesAdministrativa();
        return view('admSolicitacoes.index', compact('ferias'));
    }

    public function getCalendario() {
        $ferias = null;
        $montaArrayCalendario = [];

        if (auth()->user()->cargo->permissao == 'administrador') {
            $ferias = $this->feriasRepository->feriasPermissaoAdminstrador();
        } else if (auth()->user()->cargo->permissao == 'funcionario') {
            $ferias = $this->feriasRepository->feriasPermissaoFuncionario();
        } else {
            $ferias = $this->feriasRepository->feriasPermissaoGestor();
        }

        foreach ($ferias as $feria) {
            $montaArrayCalendario[] = [
                'id' => $feria->id,
                'title' => $feria->titulo, 
                'start' => Carbon::createFromFormat('d/m/Y', $feria->data_inicio)->format('Y-m-d'), 
                'end' => Carbon::createFromFormat('d/m/Y', $feria->data_retorno)->format('Y-m-d'),
                'observacao'=> $feria->observacao,
                'allDay' => true,
                "backgroundColor" => "#28A745",
                "textColor" => "#FFFFFF",
                "localizacao" => $feria->local_ferias
            ];
        }

        return view('calendario.telaCalendario', compact('montaArrayCalendario'));
    }

    public function aprovaSolicitacao($id) {
        // status = aprovado e manda para exibir no calendario

        DB::beginTransaction();

        try {
            $ferias = Ferias::findOrFail($id);
            $ferias->status = 'aprovado';
            $ferias->user_autorizacao_id = auth()->user()->id;
            $ferias->update();
            DB::commit();
            return redirect()->route('adm.ferias.solicitacoes')->with('sucesso', 'Férias aprovadas com sucesso, e-mail enviado para o funcionário!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function negaSolicitacao($id) {
        // status = negado e manda um email explicando o porque

        DB::beginTransaction();

        try {
            $ferias = Ferias::findOrFail($id);
            $ferias->status = 'recusado';
            $ferias->user_autorizacao_id = auth()->user()->id;
            $ferias->update();
            DB::commit();
            return redirect()->route('adm.ferias.solicitacoes')->with('sucesso', 'Férias recusada, e-mail enviado para o funcionário!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function sugereAlteracaoSolicitacao($id) {
        // status = pendente e manda um email sobre a sugestao
    }
}
