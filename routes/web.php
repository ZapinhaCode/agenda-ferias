<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FeriasController;
use App\Http\Controllers\SetorController;

Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/inicial', function () {
    return view('inicial');
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

Route::resource('setor', SetorController::class)->names([
    'index' => 'setor.lista',
    'create' => 'setor.adicionar',
    'store' => 'setor.salvar',
    'show' => 'setor.mostrar',
    'edit' => 'setor.editar',
    'update' => 'setor.atualizar',
    'destroy' => 'setor.excluir',
]);