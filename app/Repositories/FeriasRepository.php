<?php

namespace App\Repositories;

use App\Models\Ferias;

class FeriasRepository {
    private $model;

    public function __construct(Ferias $feriasRepository) {
        $this->model = $feriasRepository;
    }

    public function all() {
        return $this->model->newQuery()
            ->get();
    }
}