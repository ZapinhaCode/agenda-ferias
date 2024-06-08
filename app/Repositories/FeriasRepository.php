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
}