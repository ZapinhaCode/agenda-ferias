<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FeriasController;

Route::get('/', function () {
    return view('layout.app');
});

Route::resource('usuario', UsuarioController::class)->names([
    'index' => 'usuario.lista',
    'create' => 'usuario.adicionar',
    'store' => 'usuario.salvar',
    'show' => 'usuario.mostrar',
    'edit' => 'usuario.editar',
    'update' => 'usuario.atualizar',
    'destroy' => 'usuario.excluir',
]);
