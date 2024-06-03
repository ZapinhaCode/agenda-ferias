<?php

namespace App\Repositories;

use App\Models\Setores;

class SetorRepository {
    private $model;

    public function __construct(Setores $setoresRepository) {
        $this->model = $setoresRepository;
    }

    public function all() {
        return $this->model->newQuery()
            ->with('gerente')
            ->get();
    }
}