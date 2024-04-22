<?php

use Illuminate\Support\Facades\Route;

Route::resource('ferias', 'FeriasController')->names([
    'index' => 'ferias.lista',
    'create' => 'ferias.criar',
    'store' => 'ferias.salvar',
    'show' => 'ferias.mostrar',
    'edit' => 'ferias.editar',
    'update' => 'ferias.atualizar',
    'destroy' => 'ferias.excluir',
]);
