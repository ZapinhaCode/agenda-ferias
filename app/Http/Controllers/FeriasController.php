<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FeriasRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Ferias;
use App\Repositories\FeriasRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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

    public function show($id) {
        $ferias = Ferias::findOrFail($id);

        if (request()->ajax()) {
            return response()->json($ferias);
        }
    
        return view('partials.modais.modalFerias', compact('ferias'));
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
        DB::beginTransaction();

        try {
            $ferias = Ferias::findOrFail($id);
            if ($ferias->envia_solicitacao == 0) {
                $ferias->enviado_solicitacao = 1;
            } else {
                $ferias->enviado_solicitacao = 0;
            }
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
        } else if (auth()->user()->cargo->permissao == 'gestor') {
            $ferias = $this->feriasRepository->feriasPermissaoGestor();
        }

        foreach ($ferias as $feria) {
            $montaArrayCalendario[] = [
                'id' => $feria->id,
                'title' => $feria->titulo, 
                'start' => $feria->data_inicio,
                'end' => $feria->data_retorno,
                'observacao'=> $feria->observacao,
                'allDay' => true,
                "backgroundColor" => $feria->ferias_cor,
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

            $details = [
                'nome' => $ferias->usuario->nome,
                'data_inicio' => Carbon::parse($ferias->data_inicio)->format('d/m/Y'),
                'data_fim' => Carbon::parse($ferias->data_retorno)->format('d/m/Y'),
                'email' => $ferias->usuario->email,
            ];

            Mail::send('emails.aprovado', ['details' => $details], function($message) use ($details) {
                $message->to($details['email'])->subject('Solicitação de Férias Aprovada');
            });

            DB::commit();
            return redirect()->route('adm.ferias.solicitacoes')->with('sucesso', 'Férias aprovadas com sucesso, e-mail enviado para o funcionário!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function negaSolicitacao($id) {
        // status = negado e manda um email dizendo que foi rejeitado

        DB::beginTransaction();

        try {
            $ferias = Ferias::findOrFail($id);
            $ferias->enviado_solicitacao = 0;
            $ferias->status = 'recusado';
            $ferias->user_autorizacao_id = auth()->user()->id;
            $ferias->update();

            $details = [
                'nome' => $ferias->usuario->nome,
                'data_inicio' =>Carbon::parse($ferias->data_inicio)->format('d/m/Y'),
                'data_fim' => Carbon::parse($ferias->data_retorno)->format('d/m/Y'),
                'email' => $ferias->usuario->email,
            ];

            Mail::send('emails.recusado', ['details' => $details], function($message) use ($details) {
                $message->to($details['email'])->subject('Solicitação de Férias Rejeitada');
            });

            DB::commit();
            return redirect()->route('adm.ferias.solicitacoes')->with('sucesso', 'Férias recusada, e-mail enviado para o funcionário!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function sugereAlteracaoSolicitacao(Request $request, $id) {
        // status = pendente e manda um email sobre a sugestao

        $input = $request->all();
        $ferias = Ferias::findOrFail($id);
        $ferias->enviado_solicitacao = 0;
        $ferias->status = 'solicitaAlteracao';
        $ferias->update();

        if (isset($input['solicitacao'])) {
            $details = [
                'nome' => $ferias->usuario->nome,
                'data_inicio' =>Carbon::parse($ferias->data_inicio)->format('d/m/Y'),
                'data_fim' => Carbon::parse($ferias->data_retorno)->format('d/m/Y'),
                'email' => $ferias->usuario->email,
                'solicitacao' => $input['solicitacao']
            ];

            Mail::send('emails.sugerirAlteracao', ['details' => $details], function($message) use ($details) {
                $message->to($details['email'])->subject('Solicitação de Alteração da Férias');
            });

            DB::commit();
            return redirect()->route('adm.ferias.solicitacoes')->with('sucesso', 'Sugestão de alteração, enviado para o funcionário com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Problema ao enviar solicitação para o funcionário, tente novamente.');
        }
    }
}
