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
            ->get();
    }
}