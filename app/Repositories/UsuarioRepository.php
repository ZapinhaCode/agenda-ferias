<?php

namespace App\Repositories;

use App\Models\User;

class UsuarioRepository {
    private $model;

    public function __construct(User $usuarioRepository) {
        $this->model = $usuarioRepository;
    }

    public function all() {
        return $this->model->newQuery()
            ->with('cargo', 'setor')
            ->get();
    }

    public function buscaUsuarioEspecifico($usuarioId) {
        return $this->model->newQuery()
            ->where('id', $usuarioId)
            ->with('cargo', 'setor')
            ->get();
    }

    public function listaGerente() {
        return $this->model->newQuery()
            ->leftJoin('cargo', 'usuario.cargo_id', 'cargo.id')
            ->where('cargo.permissao', 'gestor')
            ->select('usuario.*')
            ->get();
    }
}