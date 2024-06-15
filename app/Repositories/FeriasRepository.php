<?php

namespace App\Repositories;

use App\Models\Ferias;
use App\Models\User;

class FeriasRepository {
    private $model;

    public function __construct(Ferias $feriasRepository) {
        $this->model = $feriasRepository;
    }

    public function minhasSolicitacoes() {
        return $this->model->newQuery()
            ->where('user_id', auth()->user()->id)
            ->with('usuarioAutoriza')
            ->get();
    }

    public function solicitacoesAdministrativa() {
        return $this->model->newQuery()
            ->where('enviado_solicitacao', 1)
            ->where('user_autorizacao_id', null)
            ->get();
    }

    public function feriasPermissaoAdminstrador() {
        return $this->model->newQuery()
            ->where('enviado_solicitacao', 1)
            ->whereNotNull('user_autorizacao_id')
            ->where('status', 'aprovado')
            ->get();
    }

    public function feriasPermissaoGestor() {
        return $this->model->newQuery()
            ->leftJoin('usuario', 'ferias.user_id', 'usuario.id')
            ->where('usuario.setor_id', auth()->user()->setor_id)
            ->where('enviado_solicitacao', 1)
            ->where('ferias.status', 'aprovado')
            ->whereNotNull('user_autorizacao_id')
            ->select('ferias.*')
            ->get();
    }

    public function feriasPermissaoFuncionario() {
        return $this->model->newQuery()
            ->where('enviado_solicitacao', 1)
            ->where('user_id', auth()->user()->id)
            ->where('status', 'aprovado')
            ->whereNotNull('user_autorizacao_id')
            ->get();
    }
}